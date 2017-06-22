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
                                ADD ITEM
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST" id="add_attribute" action="{{ url('/product/add-new-product')  }}">
                                    {{ csrf_field() }}
                                <div class="row clearfix">
                                <div class="col-sm-6 ">
                                    <label class="form-label">Item Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="product_name" required class="form-control">

                                    </div>
                                </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="password">Please select Category</label>
                                   <div class="form-line form-group">
                                    <select class="form-control show-tick" id="categor_product" required name="category_name">
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
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <input type="checkbox" id="without_attribute" name="without_attribute" class="filled-in">
                                        <label for="without_attribute">Would You Like To Add Product With out any Variant</label>
                                    </div>
                                </div>
                                <div class="response">

                                </div>

                                <button type="submit" id="submit_pro"  class="btn btn-primary m-t-15 waves-effect">Add Item</button>
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
