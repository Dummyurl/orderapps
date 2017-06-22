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
                                ADD CATEGORY
                    </h2>
                        </div>
                        <div class="body">
                            <form method="POST" id="add_attribute" action="{{ url('/category/add-category')  }}">
                                {{ csrf_field() }}
                                <label class="form-label">Category Name</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  name="category_name" required class="form-control">

                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <input type="checkbox" id="without_Variant_cate" name="without_Variant_cate" class="filled-in">
                                        <label for="without_Variant_cate">Would You Like To Add Category With out any Variant</label>
                                    </div>
                                </div>

                                <div class="attribut-form clearfix">
                                    <div id="entry1" class="row clonedInput">
                                        <div class="col-md-6">
                                            <label class="form-label">Variant Name</label>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text"  name="attribute_name" value="" required class="form-control input_value">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="counter" value="1" id="counter">
                                    <button type="button" id="btnAdd" name="btnAdd" class="btn btn-info">+</button>
                                    <button type="button" id="btnDel" name="btnDel" class="btn btn-danger">-</button>


                                </div>

                             <button type="submit"  class="btn btn-primary m-t-15 waves-effect">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->



        </div>
    </section>

@endsection
