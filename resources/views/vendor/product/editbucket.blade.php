@extends('app')

@section('main-content')
    <link href="{{ URL::asset('public/plugins/bootstrap-select/css/bootstrap-select.css')  }}" rel="stylesheet" />
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>EDIT BUCKET ITEM</h2>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{strtoupper($bucket['bucket_name'])}}

                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST" id="add_attribute" action="{{ url('/product/update-bucket-product')  }}">
                                {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-sm-6 ">
                                        <label class="form-label">Bucket Name</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text"  name="bucket_name" value="{{ $bucket['bucket_name'] }}" required class="form-control">
                                                <input type="hidden"  name="buk_id" value="{{ $bucket['id'] }}">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 ">
                                        <label class="form-label">Category Name</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" disabled name="bucket_name" value="{{ $bucket['category'] }}" required class="form-control">
                                             </div>
                                        </div>
                                    </div>


                                </div>
                                {{--<div class="row clearfix">--}}
                                {{--<div class="col-md-12 "counter_optional" => "3"
"counter_bucket" => "">--}}
                                {{--<input type="checkbox" id="optional_item" name="optional_item" class="filled-in">--}}
                                {{--<label for="optional_item">The Item You entered has any optional Items.</label>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                <div class="row clearfix">
                                    <div class="col-sm-6 ">
                                        <label class="form-label">Bucket Price</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" value="{{ $bucket['bucket_price'] }}" name="bucket_price" required class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 ">
                                        <label class="form-label">Bucket Description</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea rows='0' required class='form-control no-resize' name='bucket_description'>{{ $bucket['bucket_description'] }}</textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">


                                    <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                        <b class="add-empty-hook">Total Bucket Item <span class="total_bucket_item">{{count($bucket['items'])}}</span></b>
                                        @foreach($bucket['items'] as $key_itm => $value_itm)
                                        <div class="panel-group" id="accordion_{{$key_itm}}" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-col-cyan">

                                                <div class="panel-heading" role="tab" id="headingOne_1">
                                                    <span style="margin-top: 3px; margin-right: 4px; float: right; z-index: 999999; ">
                                                            <button type="button" data-react="{{$value_itm['id']}}" class="buk_itm_delete btn bg-red waves-effect">
                                                                Delete
                                                            </button>
                                                        </span>
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion_{{$key_itm}}" href="#collapseOne_{{$key_itm}}" aria-expanded="false" aria-controls="collapseOne_1" class="collapsed link-parent">
                                                            Bucket Item #{{$key_itm + 1}}
                                                         </a>

                                                    </h4>

                                                </div>
                                                <div id="collapseOne_{{$key_itm}}" class="panel-collapse collapse bindpanel" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body">
                                                        <div class="row clearfix">
                                                            <div class="col-sm-6 ">
                                                                <label class="form-label">Bucket Item Name</label>
                                                                <div class="form-group form-float">
                                                                    <div class="form-line">
                                                                        <input type="text" value="{{$value_itm['item_name']}}" name="item_name[{{$key_itm}}]" required class="form-control single-index">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 ">
                                                                <label class="form-label">Bucket Item Quantity</label>
                                                                <div class="form-group form-float">
                                                                    <div class="form-line">
                                                                        <input type="number" value="{{$value_itm['item_qty']}}" min="0" max="50" name="item_qty[{{$key_itm}}]" required class="form-control single-index">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="card">
                                                                <div class="header bg-blue-grey">
                                                                    <h2>
                                                                        Optionable Items
                                                                        <small>
                                                                            Define Option Item for user to select Above Mention Quantity for Bucket Item
                                                                        </small>
                                                                    </h2>
                                                                </div>
                                                                <div class="body remove_optional">
                                                                    @foreach($value_itm['related_items'] as $key_related => $value_related)
                                                                    <div class="row clearfix" data-react="{{$value_related['id']}}">
                                                                        <div class="col-sm-5 ">
                                                                            <label class="form-label">Optional Item Name</label>
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <input type="text" value="{{$value_related['optional_item_name']}}"  name="optional_item_name[{{$value_itm['item_name']}}][{{$key_related}}]" class="form-control double-index">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5 ">
                                                                            <label class="form-label">Optional Item Price</label>
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                    <input type="text" value="{{$value_related['optional_item_price']}}"  name="optional_item_price[{{$value_itm['item_name']}}][{{$key_related}}]" class="form-control double-index">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <button type="button" class="optional_itm_delete btn bg-red waves-effect">
                                                                                Delete
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    <div class="row clearfix icon-button-demo text-right">
                                                                        <input type="hidden"  name="counter_optional" value="1" >
                                                                        <button type="button" id="edit_add_optional_item" class="btn bg-grey btn-circle waves-effect waves-circle waves-float">
                                                                            <i class="material-icons">add</i>
                                                                            <button type="button" id="remove_optional_item" class="btn bg-blue-grey btn-circle waves-effect waves-circle waves-float">
                                                                                <i class="material-icons">remove</i>
                                                                            </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>




                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach
                                        <div class="row text-right button-demo">
                                            <input type="hidden"  name="counter_bucket" value="1" >
                                            <button type="button" id="edit_add_bucket_item" class="btn bg-teal waves-effect">Add Bucket Item</button>
                                            <button type="button" id="edit_remove_bucket_item" class="btn bg-light-blue waves-effect">Remove Bucket Item</button>
                                        </div>
                                    </div>
                                </div>





                                <div class="response">

                                </div>

                                <button type="submit" id="submit_pro"  class="btn btn-primary m-t-15 waves-effect">Save Item</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->

            {{--<div class="row clearfix">--}}
            {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">--}}
            {{--<div class="card">--}}
            {{--<div class="header">--}}
            {{--<h2>--}}
            {{--ALL ATTRIBUTE--}}
            {{--</h2>--}}
            {{--</div>--}}
            {{--<div class="body">--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div>
    </section>
    {{--<script src="{{ URL::asset('public/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>--}}
@endsection
