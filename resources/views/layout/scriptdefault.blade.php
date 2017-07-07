<!-- Jquery Core Js -->
<script src="{{URL::asset('public/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('public/plugins/print/printThis.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{URL::asset('public/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->
<script src="{{URL::asset('public/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{URL::asset('public/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{URL::asset('public/plugins/node-waves/waves.js')}}"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="{{URL::asset('public/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('public/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>

<script src="{{URL::asset('public/plugins/jquery-validation/jquery.validate.js')}}"></script>


<!-- Jquery CountTo Plugin Js -->
<script src="{{URL::asset('public/plugins/jquery-countto/jquery.countTo.js')}}"></script>

<!-- Morris Plugin Js -->
<script src="{{URL::asset('public/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{URL::asset('public/plugins/morrisjs/morris.js')}}"></script>

<!-- ChartJs -->
<script src="{{URL::asset('public/plugins/chartjs/Chart.bundle.js')}}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->

<!-- Autosize Plugin Js -->
<script src="{{URL::asset('public/plugins/autosize/autosize.js')}}"></script>
<!-- Moment Plugin Js -->
<script src="{{URL::asset('public/plugins/momentjs/moment.js')}}"></script>

<script src="{{URL::asset('public/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

<script src="{{URL::asset('public/plugins/chartjs/Chart.bundle.js')}}"></script>

 {{--Sweet Alert--}}
<script src="{{URL::asset('public/plugins/sweetalert/sweetalert.min.js')}}"></script>

<!-- Custom Js -->
<script src="{{URL::asset('public/js/admin.js')}}"></script>

<script src="{{ URL::asset('public/plugins/bootstrap-notify/bootstrap-notify.js')  }}"></script>
<!-- Demo Js -->
<script src="{{URL::asset('public/js/demo.js')}}"></script>
<script src="{{URL::asset('public/js/pages/examples/sign-in.js')}}"></script>
<script src="{{URL::asset('public/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{URL::asset('public/js/script.js')}}"></script>
<script type="text/javascript">
    $(function () {
        //Textare auto growth
        autosize($('textarea.auto-growth'));

        //Datetimepicker plugin
        $('.datetimepicker').bootstrapMaterialDatePicker({
            format: 'dddd DD MMMM YYYY - HH:mm',
            clearButton: true,
            weekStart: 1
        });

        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'dddd DD MMMM YYYY',
            clearButton: true,
            weekStart: 1,
            time: false
        });

        $('.timepicker').bootstrapMaterialDatePicker({
            format: 'HH:mm',
            clearButton: true,
            date: false
        });
        $('.js-basic-example').DataTable({
            responsive: true
        });
    });

</script>