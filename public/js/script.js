
$(document).ready(function () {

    $.validator.addMethod("valueNotEquals", function(value, element, arg){
        return arg != value;
    }, "Value must not equal arg.");

    // configure your validation
    $("#add_attribute").validate({
        rules: {
            category_name: { valueNotEquals: "default" }
        },
        messages: {
            category_name: { valueNotEquals: "Please select an item!" }
        },highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        }

    });

    $(document).on('click','#submit_pro' ,function () {
        $('#add_attribute').valid();
    })
    // $('#submit_pro').click(function () {
    //
    // });

    if(status == 101){
        $.notify({
            message: message
        },
            {
                allow_dismiss: true,
                newest_on_top: true,
            timer: 1000,
            placement:{
                    from: 'top',
                align: 'right'
            },
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
        });
    };

    $('#btnAdd').click(function() {
        var num = $('.clonedInput').length, // Checks to see how many "duplicatable" input fields we currently have
            newNum = new Number(num + 1), // The numeric ID of the new input field being added, increasing by 1 each time
            newElem = $('#entry' + num).clone().attr('id', 'entry' + newNum).fadeIn('slow'); // create the new element via clone(), and manipulate it's ID using newNum value
            newElem.find('.input_value').attr('id', 'value' + newNum).attr('name', 'attribute_name' + newNum).val('');
         newElem.find(':not([data-upgraded=""])').attr('data-upgraded', '');
        newElem.find('input[type=text]').attr('disabled',false);
        //Update the counter
        $('#counter').val(newNum);




        // Insert the new element after the last "duplicatable" input field
        $('#entry' + num).after(newElem);
        $('#ID' + newNum + '_title').focus();

        // Enable the "remove" button. This only shows once you have a duplicated section.
        $('#btnDel').attr('disabled', false);
        $('#btnDelEdit').attr('disabled', false);

    });

    $('#btnDel').click(function() {
        // Confirmation dialog box. Works on all desktop browsers and iPhone.
        // if (confirm("Are you sure you wish to remove this section? This cannot be undone."))
        //     {
        var num = $('.clonedInput').length;
        // how many "duplicatable" input fields we currently have
        $('#entry' + num).slideUp('slow', function() {
            $(this).remove();

            $('#counter').val(num - 1);

            // if only one element remains, disable the "remove" button
            if (num - 1 === 1)
                $('#btnDel').attr('disabled', true);
            // enable the "add" button
            $('#btnAdd').attr('disabled', false).prop('value', "add section");
        });
        //    }
        return false; // Removes the last section you added
    });

    $('#btnDelEdit').click(function() {
        // Confirmation dialog box. Works on all desktop browsers and iPhone.
        // if (confirm("Are you sure you wish to remove this section? This cannot be undone."))
        //     {
        var num = $('.clonedInput').length;
        // how many "duplicatable" input fields we currently have
        $('#entry' + num).slideUp('slow', function() {
            $(this).remove();

            $('#counter').val(num - 1);

            // if only one element remains, disable the "remove" button
            if (num - 1 === parseInt($('#initial_counter').val()))
                $('#btnDelEdit').attr('disabled', true);
            // enable the "add" button
            $('#btnAdd').attr('disabled', false).prop('value', "add section");
        });
        //    }
        return false; // Removes the last section you added
    });

    // Enable the "add" button
    $('#btnAdd').attr('disabled', false);
    // Disable the "remove" button
    $('#btnDel').attr('disabled', true);
    $('#btnDelEdit').attr('disabled', true);


$('#categor_product').change(function () {
    $('#add_attribute').valid();
   var id = $('#categor_product option:selected').val();
    $('.response').empty();
    $.ajax({
        type: "GET",
        url: APP_URL + '/product/get-category-attr/' + id,
        dataType: 'json',
        data: id,
        success: function(data) {
           console.log(data);
             $.each(data,function (index,value) {
                    var tempalte = "<div class='row clearfix'>"
                            tempalte +="<div class='col-sm-4'>"
                            tempalte += "<label class='form-label'>Variant Name</label>"
                                tempalte += "<div class='form-group form-float'>"
                                     tempalte += "<div class='form-line'>"
                                        tempalte += "<input type='text' readonly='readonly' name='attribute_name[]' value='"+value.attribute_name+"' class='form-control'>"
                                        tempalte += "<input type='hidden' name='attribute_id[]' value='"+value.id+"' class='form-control'>"
                                     tempalte += "</div>"
                                 tempalte += "</div>"
                             tempalte += "</div>"
                        tempalte +="<div class='col-sm-4'>"
                            tempalte += "<label class='form-label'>Item Price As Per This Variant</label>"
                                tempalte += "<div class='form-group form-float'>"
                                  tempalte += "<div class='form-line'>"
                                     tempalte += "<input type='text' required name='procuctpriceattr[]' class='form-control'>"
                                  tempalte += "</div>"
                               tempalte += "</div>"
                           tempalte += "</div>"
                     tempalte +="<div class='col-sm-4'>"
                        tempalte += "<label class='form-label'>Item Description</label>"
                             tempalte += "<div class='form-group form-float'>"
                                 tempalte += "<div class='form-line'>"
                                     tempalte += "<textarea rows='0' required class='form-control no-resize' name='procuctdescription[]'></textarea>"
                                tempalte += "</div>"
                             tempalte += "</div>"
                    tempalte += "</div>"
                 tempalte += "</div>"

            $('.response').append(tempalte);

            })

        }
    });

});

$('#without_Variant_cate').change(function () {
    $('.attribut-form').next('.add-new-row').remove();
    if($(this).prop('checked') == true){
        $('.attribut-form').hide();
    var template =  "<div class='row clearfix add-new-row'>"
        template+= "<div class='col-md-12'>"
        template += "<input type='hidden'  name='bucket_item_cate' value=''>"
        template+= "<input type='checkbox' id='bucket_cate' name='bucket_cate' class='filled-in'>"
        template+= "<label for='bucket_cate'>The Category You Entered is belongs to Bucket Category</label>"
        template+=  "</div>"
        template+=  "</div>"
        $('.attribut-form').after(template);

    }
    else{
        $('.attribut-form').show();
    }
})

    $(document).on('click','#bucket_cate',function () {
        if($(this).prop('checked') == true){
            $(this).prev().val(1);
        }
        else {
            $(this).prev().val('');
        }

    });

$('#without_attribute').change(function () {

    if($(this).prop('checked') == true){
          $('.response').empty();
        $('#categor_product').attr('disabled', true);
        var cat_id = $('#categor_product option:selected').val();
        var tempalte = "<div class='row clearfix'>"
                tempalte +="<div class='col-sm-6'>"
                              tempalte += "<label class='form-label'>Item Price</label>"
                        tempalte += "<div class='form-group form-float'>"
                             tempalte += "<div class='form-line'>"
                                tempalte += "<input type='text' required name='procuctprice' class='form-control'>"
                                tempalte += "<input type='hidden'  name='category_name' value='"+cat_id+"' class='form-control'>"
                             tempalte += "</div>"
                        tempalte += "</div>"
                    tempalte += "</div>"
        tempalte +="<div class='col-sm-4'>"
        tempalte += "<label class='form-label'>Item Description</label>"
        tempalte += "<div class='form-group form-float'>"
        tempalte += "<div class='form-line'>"
        tempalte += "<textarea rows='0' required class='form-control no-resize'  name='procuctdescription'></textarea>"
        tempalte += "</div>"
        tempalte += "</div>"
        tempalte += "</div>"
        tempalte += "</div>"
        $('.response').append(tempalte);
    }
    else {
        $('#categor_product').attr('disabled', false);
        if($('#categor_product option:selected').val() !=''){
            var id = $('#categor_product option:selected').val();
            $('.response').empty();
            $.ajax({
                type: "GET",
                url: APP_URL + '/product/get-category-attr/' + id,
                dataType: 'json',
                data: id,
                success: function(data) {
                    console.log(data);
                    $.each(data,function (index,value) {
                        var tempalte = "<div class='row clearfix'>"
                        tempalte +="<div class='col-sm-4'>"
                        tempalte += "<label class='form-label'>Variant Name</label>"
                        tempalte += "<div class='form-group form-float'>"
                        tempalte += "<div class='form-line'>"
                        tempalte += "<input type='text' readonly='readonly' name='attribute_name[]' value='"+value.attribute_name+"' class='form-control'>"
                        tempalte += "<input type='hidden' name='attribute_id[]' value='"+value.id+"' class='form-control'>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte +="<div class='col-sm-4'>"
                        tempalte += "<label class='form-label'>Item Price As Per This Variant</label>"
                        tempalte += "<div class='form-group form-float'>"
                        tempalte += "<div class='form-line'>"
                        tempalte += "<input type='text' required name='procuctpriceattr[]' class='form-control'>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte +="<div class='col-sm-4'>"
                        tempalte += "<label class='form-label'>Item Description</label>"
                        tempalte += "<div class='form-group form-float'>"
                        tempalte += "<div class='form-line'>"
                        tempalte += "<textarea rows='0' required class='form-control no-resize' name='procuctdescription[]'></textarea>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"
                        tempalte += "</div>"

                        $('.response').append(tempalte);

                    })

                }
            });

        }
        else {
            $('.response').empty();
        }
    }
});


            $(document).on('click','#add_optional_item',function () {
                var that = $(this);
                var hiddencounter = that.prev().val();
                var elementToClone = that.parent().prev();
                var clone = elementToClone.clone();
                clone.find('input[type=text]').val('');
                clone.addClass('removeable')
                elementToClone.after(clone);
                that.prev().val(parseInt(++hiddencounter));
            });

    $(document).on('click','#remove_optional_item',function () {
        var that = $(this);
        var hiddencounter = that.prev().prev().val();
        if(parseInt(hiddencounter) == 1){
            return false;
        }
        else {
            var elementToRemove = that.parent().prev();

            elementToRemove.remove();

            var hiddencounter = that.prev().prev().val();
            that.prev().prev().val(parseInt(--hiddencounter));
        }
    });

        function replacestring(string) {
            var start = string.indexOf('_') + 1;
            var x = parseInt(string.charAt(start)) + 1;
            var stringval = string.substring(0, start);
            return stringval+x;
        }

        function replacefromhash(str) {
            var string = str.trim();
            var start = string.indexOf('#') + 1;
            var x = parseInt(string.charAt(start)) + 1;
            var stringval = string.substring(0, start);
            return stringval+x;
        }

        function replacefrombraces(str){
            var start = str.indexOf('[') + 1;
            var x = parseInt(str.charAt(start)) + 1;
            var string = str.substring(0, start);
            var returnstring = string + x + ']';
            return returnstring
        }

    function replacefromdoublebraces(str){
        var start = str.indexOf('[') + 1;
        var x = parseInt(str.charAt(start)) + 1;
        var string = str.substring(0, start);
        var returnstring = string + x + '][]';
        return returnstring
    }

    $(document).on('click','#add_bucket_item',function () {
        var that = $(this);
        var elementToClone = that.parent().prev();
        var clone = elementToClone.clone();
        var cloneID = clone.attr('id');
         clone.attr('id', replacestring(cloneID));
         var link_parnet = clone.find('.link-parent').attr('data-parent');
        clone.find('.link-parent').attr('data-parent',replacestring(link_parnet));
        var link_parnet = clone.find('.link-parent').attr('href');
        clone.find('.link-parent').attr('href',replacestring(link_parnet));
        var cloneitm_text = clone.find('.link-parent').text();
        clone.find('.link-parent').text(replacefromhash(cloneitm_text));
        var bind_panel = clone.find('.bindpanel').attr('id');
        clone.find('.bindpanel').attr('id',replacestring(bind_panel));
        clone.find('input[type=text]').val('');
        clone.find('input[type=hidden]').val(1);
        clone.find('.removeable').remove();
        var input_text = clone.find('.single-index').each(function () {
            var item = $(this).attr('name');
            $(this).attr('name',replacefrombraces(item))
        });

        var input_number = clone.find('.double-index').each(function () {
            var item_num = $(this).attr('name');
            $(this).attr('name',replacefromdoublebraces(item_num))
        });
        var hiddencounter_bucket = that.prev().val();
        that.prev().val(parseInt(++hiddencounter_bucket));
         elementToClone.after(clone);
    });

        $(document).on('click','#remove_bucket_item' ,function () {
            var that = $(this);
            var hiddencounter = that.prev().prev().val();
            if(parseInt(hiddencounter) == 1){
                return false;
            }
            else {
                var elementToRemove = that.parent().prev();
                elementToRemove.remove();
                var hiddencounter = that.prev().prev().val();
                that.prev().prev().val(parseInt(--hiddencounter));
            }
        });

    $(document).on('click','#editdelivery',function () {
        var post_code = $(this).parent().
        $('#editdeliveryModal').modal('show');
    });

    $(document).on('click','.order-details' ,function () {
        $('.content').css('opacity','0');
        $('.loading-custom').show();
        var id = $(this).attr('data-react');
       $('#userOrder').empty();

        $.ajax({
            type: "GET",
            url: APP_URL + '/get-order/' + id,
            data: id,
            success: function(data) {
                console.log(data);
                $('#userName').text(data.full_name);
                $('#contact_no').text(data.phone_no);
                $('#userEmail').text(data.email);
                $('#deliveryPost').text(data.delivery_post_code);
                $('#address1').text(data.address_line1);
                $('#delivery').text((data.delivery == 1 ? 'Yes' : 'No'));
                $('#collection').text((data.collection == 1 ? 'Yes' : 'No'));
                $('#reqDelevTime').text((data.request_delivery_time == null ? '' : data.request_delivery_time));
                $('#instruction').text((data.intruction == null ? '' : data.intruction));
                $('#discountCode').text((data.discount_code == null ? '' : data.discount_code));
                $('#orderTiming').text(data.created_at);
                $('#status').text(data.status);

                data.product_detail.forEach(function (value,index) {
                   var tamplate = "<li class='list-group-item'>"+value.itm_name+"<span style='float: right'>"+value.itm_price+"</span></li>"
                    $('#userOrder').prepend(tamplate);
                });
                var delvrycharge = "<li class='list-group-item'>Delivery Charge<span style='float: right'>"+data.delivery_charge+"</span></li>"
                $('#userOrder').append(delvrycharge);
                var fee = "<li class='list-group-item'>Transcation Fee<span style='float: right'>"+data.transacation_fee+"</span></li>"
                $('#userOrder').append(fee);
                var dsct= "<li class='list-group-item'>Discount<span style='float: right'>"+(data.discount == null ? '' : data.discount)+"</span></li>"
                $('#userOrder').append(dsct);
                var ttl = "<li class='list-group-item'>Total<span style='float: right'>"+data.total+"</span></li>"
                $('#userOrder').append(ttl);

                $('.content').css('opacity','1');
                $('.loading-custom').hide();
                $('#order-Modal').modal('show');



            }
        });

    });

    $(document).on('click','#printOrder',function () {
        $('#orderDetails').printThis();
    });


});