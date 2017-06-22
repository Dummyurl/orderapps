@extends('app')

@section('main-content')
    <link href="{{ URL::asset('public/plugins/bootstrap-select/css/bootstrap-select.css')  }}" rel="stylesheet" />
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>MENU ITEMS</h2>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADD BUCKET ITEM
                            </h2>
                        </div>
                        <div class="body">
                                <form method="POST" id="add_attribute" action="{{ url('/product/add-new-bucket-product')  }}">
                                {{ csrf_field() }}
                                <div class="row clearfix">
                                    <div class="col-sm-6 ">
                                        <label class="form-label">Bucket Name</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text"  name="bucket_name" required class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="password">Please select Category</label>
                                        <div class="form-line form-group">
                                            <select class="form-control show-tick" id="categor_product" required name="cat_id">
                                                <option value="default">Please Select Category</option>
                                                @foreach($category as $categorykey => $valuecategory)
                                                    <option value="{{$valuecategory['id']}}">{{$valuecategory['category_name']}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-field">

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
                                                <input type="text"  name="bucket_price" required class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 ">
                                        <label class="form-label">Bucket Description</label>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <textarea rows='0' required class='form-control no-resize' name='bucket_description'></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">


                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                        <b>Bucket Item</b>
                                    <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-col-cyan">
                                            <div class="panel-heading" role="tab" id="headingOne_1">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="false" aria-controls="collapseOne_1" class="collapsed link-parent">
                                                        Bucket Item #1
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_1" class="panel-collapse collapse bindpanel" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <div class="row clearfix">
                                                    <div class="col-sm-6 ">
                                                        <label class="form-label">Bucket Item Name</label>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text"  name="item_name[0]" required class="form-control single-index">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                        <label class="form-label">Bucket Item Quantity</label>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="number" min="0" max="50" name="item_qty[0]" required class="form-control single-index">
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
                                                                <div class="row clearfix">
                                                                    <div class="col-sm-6 ">
                                                                        <label class="form-label">Optional Item Name</label>
                                                                        <div class="form-group form-float">
                                                                            <div class="form-line">
                                                                                <input type="text"  name="optional_item_name[0][]" class="form-control double-index">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 ">
                                                                        <label class="form-label">Optional Item Price</label>
                                                                        <div class="form-group form-float">
                                                                            <div class="form-line">
                                                                                <input type="text"  name="optional_item_price[0][]" class="form-control double-index">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix icon-button-demo text-right">
                                                                    <input type="hidden"  name="counter_optional" value="1" >
                                                                    <button type="button" id="add_optional_item" class="btn bg-grey btn-circle waves-effect waves-circle waves-float">
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
                                    <div class="row text-right button-demo">
                                        <input type="hidden"  name="counter_bucket" value="1" >
                                            <button type="button" id="add_bucket_item" class="btn bg-teal waves-effect">Add Bucket Item</button>
                                        <button type="button" id="remove_bucket_item" class="btn bg-light-blue waves-effect">Remove Bucket Item</button>
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
