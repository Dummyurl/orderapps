@extends('app')

@section('main-content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ABOUT US</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            About Us Information
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#opening_closing_time" data-toggle="tab">
                                        <i class="material-icons">home</i> Opening & Closing Time
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#delivery_information" data-toggle="tab">
                                        <i class="material-icons">face</i> Delivery Information
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#contact_us" data-toggle="tab">
                                        <i class="material-icons">email</i> Contact Us
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="opening_closing_time">
                                    <div class="body">
                                        <form method="POST" id="add_attribute" action="{{ url('/about-us-timing')  }}">
                                            {{csrf_field()}}
                                        <h2 class="card-inside-title text-center">Week Days Timing</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <label class="form-label">Days</label>
                                            </div>
                                            <div class="col-sm-3">
                                                <label class="form-label">Opening Time</label>
                                            </div>

                                            <div class="col-sm-3">
                                                <label class="form-label">Closing Time</label>
                                            </div>

                                            <div class="col-sm-3">
                                                <label class="form-label">Collection Time</label>
                                            </div>


                                        </div>
                                        @foreach($timing as $key => $time)
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" readonly name="day[]" class="form-control" value="{{(isset($time['day'])) ? $time['day'] : ''}}">
                                                        <input type="hidden" name="id[]" class="form-control" value="{{(isset($time['id'])) ? $time['id']:''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="opening_time[]" value="{{(isset($time['opening_time'])) ? $time['opening_time']:''}}" class="form-control timepicker" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="closing_time[]" value="{{(isset($time['closing_time'])) ? $time['closing_time']:''}}" class="form-control timepicker" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" name="collection_timing[]" value="{{(isset($time['collection_timing'])) ? $time['collection_timing']:''}}" class="form-control timepicker" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       @endforeach
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Timing</button>
                                        </form>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="delivery_information">
                                    <div class="body">
                                        <form method="POST" id="add_attribute" action="{{ url('/about-us-delivery-information')  }}">
                                            {{csrf_field()}}
                                            <h2 class="card-inside-title text-center">Delivery Information</h2>
                                            <label class="form-label">Post Code</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="post_code" required class="form-control">
                                                </div>
                                            </div>
                                            <label class="form-label">Minimum Order Value</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="min_order_val" required class="form-control">
                                                </div>
                                            </div>
                                            <label class="form-label">Delivery Charge</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="delivery_charge" required class="form-control">
                                                </div>
                                            </div>
                                            <label class="form-label">Approx Delivery Timing</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="aprrox_delivery_time" required class="form-control">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Delivery</button>
                                        </form>

                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h2>
                                                        Delivery Details
                                                    </h2>
                                                </div>
                                                <div class="body">
                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Post Code</th>
                                                            <th>Minimum Order Value</th>
                                                            <th>Delivery Charge</th>
                                                            <th>Approx Delivery Time</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($delivery as $key_delivery => $value_delivery)
                                                        <tr>
                                                            <td>{{$value_delivery['id']}}</td>
                                                            <td>{{$value_delivery['post_code']}}</td>
                                                            <td>{{$value_delivery['min_order_val']}}</td>
                                                            <td>{{$value_delivery['delivery_charge']}}</td>
                                                            <td>{{$value_delivery['aprrox_delivery_time']}}</td>
                                                            <td> <button type="submit" id="editdelivery" class="btn btn-primary m-t-15 waves-effect">Edit</button>
                                                                <button type="submit" class="btn btn-info m-t-15 waves-effect">Delete</button>
                                                            </td>
                                                        </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="contact_us">
                                    <div class="body">
                                        <form method="POST" id="add_attribute" action="{{ url('/about-us-contact')  }}">
                                            {{csrf_field()}}
                                            <h2 class="card-inside-title text-center">Address And Contact Information</h2>
                                            <label class="form-label">Address</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="hidden" value="{{(isset($address[0]['id'])) ? $address[0]['id']:''}}"  name="id">
                                                    <textarea rows="0" required="" class="form-control no-resize" name="address">{{(isset($address[0]['address'])) ? $address[0]['address']:''}}</textarea>
                                                </div>
                                            </div>
                                            <label class="form-label">City</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" value="{{(isset($address[0]['city'])) ? $address[0]['city']:''}}"  name="city" required class="form-control">
                                                </div>
                                            </div>
                                            <label class="form-label">Contact No.</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" value="{{(isset($address[0]['contact_no'])) ? $address[0]['contact_no']:''}}"  name="contact_no" required class="form-control">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update Contact</button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="modal fade" id="editdeliveryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

@endsection
