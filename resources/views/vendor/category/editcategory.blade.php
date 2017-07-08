@extends('app')

@section('main-content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CATEGORY</h2>
            </div>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT CATEGORY
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST" id="add_attribute" action="{{ url('/category/edit-category-post')  }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="bucket_cat" value="{{$category['bucket_cat']}}" id="bucket_cat_edit">
                                <input type="hidden" name="cat_id" value="{{$category['id']}}" id="cat_id_edit">
                                <label class="form-label">Category Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="category_name" value="{{$category['category_name']}}" required class="form-control">

                                    </div>
                                </div>

                                @if(array_key_exists('category_attribute',$category))

                                    <div class="attribut-form clearfix">
                                    @foreach($category['category_attribute'] as $key_cate_attr => $value_cate_attr)
                                            <div id="entry{{$key_cate_attr+1}}" class="row clonedInput">
                                                <div class="col-md-6">
                                                    <label class="form-label">Variant Name</label>
                                                    <div class="form-group form-float">
                                                        <div class="form-line">
                                                            <input type="text"  name="attribute_name" disabled="disabled" value="{{$value_cate_attr['attribute_name']}}" class="form-control input_value">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                     @endforeach
                                        <input type="hidden" name="counter" value="{{count($category['category_attribute'])}}" id="counter">
                                        <input type="hidden" name="initial_counter" value="{{count($category['category_attribute'])}}" id="initial_counter">
                                        <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">+</button>
                                        <button type="button" id="btnDelEdit" name="btnDel" class="btn btn-danger">-</button>
                                    </div>


                                 @else

                                 @endif

                                {{--<div class="row clearfix">--}}
                                    {{--<div class="col-md-12">--}}
                                        {{--<input type="checkbox" id="without_Variant_cate" name="without_Variant_cate" class="filled-in">--}}
                                        {{--<label for="without_Variant_cate">Would You Like To Add Category With out any Variant</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            <button type="submit"  class="btn btn-primary m-t-15 waves-effect">Update Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->



        </div>
    </section>

@endsection
