@extends('app')

@section('main-content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ORDERS</h2>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ORDERS HISTORY
                            </h2>
                        </div>
                        <div class="body">
                            <ul class="list-group">
                                @foreach($orders as $key_ord => $value_ord)
                                    <li class="list-group-item">
                                        <?php
                                        $temp_array = [];
                                        foreach ($value_ord['product_detail'] as $key => $value){
                                            array_push($temp_array,$value['itm_name']);
                                        }
                                        $itm = implode(",",$temp_array);

                                        ?>
                                        <div class="col-md-6">
                                            {{$itm}}
                                            <span class="badge bg-pink">${{$value_ord['total']}}</span>
                                        </div>


                                        <div class="text-center">
                                            <a href="javascript:void(0)" data-react="{{$value_ord['id']}}" class="order-details text-right">View Details</a>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->



        </div>
    </section>

    <div class="modal" id="order-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog custom-modal-dialog" role="document">
            <div class="modal-content">
                {{--<div class="modal-header">--}}
                {{--<h4 class="modal-title" id="defaultModalLabel">Order Detail</h4>--}}
                {{--</div>--}}
                <div class="row clearfix" id="orderDetails">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="header">
                                <div class="row clearfix">
                                    <div class="col-xs-12 col-sm-6">
                                        <h3>Order Details</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-6 clearfix">
                                        <h4>User Detail</h4>
                                        <li class="list-group-item">
                                            <span >Full Name : </span>
                                            <span id="userName" style="margin-left: 15px"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span >Contact No. : </span>
                                            <span id="contact_no" style="margin-left: 15px"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span>Email : </span>
                                            <span id="userEmail" style="margin-left: 15px"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span >Delivery Post Code :</span>
                                            <span id="deliveryPost" style="margin-left: 15px"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span >Address Line 1 :</span>
                                            <span id="address1" style="margin-left: 15px"></span>
                                        </li>
                                        <li class="list-group-item">
                                            <span >Address Line 2 :</span>
                                            <span id="address2" style="margin-left: 15px"></span>
                                        </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 clearfix">
                                        <h4>Other Detail</h4>
                                        <ul class="list-group">
                                            <li class="list-group-item">

                                                <span style="">Delivery : </span>
                                                <span id="delivery" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">

                                                <span style="">Collection : </span>
                                                <span id="collection" style="margin-left: 15px">No</span>
                                            </li>
                                            <li class="list-group-item">

                                                <span style="">Request Delivery Time : </span>
                                                <span id="reqDelevTime" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Instruction :</span>
                                                <span id="instruction" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Discount Code :</span>
                                                <span id="discountCode" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Order Timing :</span>
                                                <span id="orderTiming" style="margin-left: 15px"></span>
                                            </li>
                                            <li class="list-group-item">
                                                <span >Status :</span>
                                                <span id="status" style="margin-left: 15px"></span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <h4 style="margin-left: 20px">User Order</h4>
                                    <ul class="list-group" id="userOrder">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="modal-body">--}}
                {{--<div class="col-md-12">--}}
                {{--<h4>User Deatail</h4>--}}
                {{--</div>--}}


                {{--</div>--}}
                <div class="modal-footer">
                    <button type="button" id="printOrder" class="btn btn-info waves-effect">Print</button>
                    <button type="button" class="btn btn-success waves-effect">Confirmed</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

@endsection
