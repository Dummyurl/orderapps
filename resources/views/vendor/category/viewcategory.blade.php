@extends('app')

@section('main-content')
    <!-- Bootstrap Select Css -->

    <link href="{{ URL::asset('public/plugins/bootstrap-select/css/bootstrap-select.css')  }}" rel="stylesheet" />
    <link href="{{ URL::asset('public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')  }}" rel="stylesheet" />
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                {{--<h2>CATEGORIES ATTRIBUTE </h2>--}}
            </div>

            <?php

            ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                         ALL CATEGORIES
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($category as $keycate => $valuecate)


                                <tr>
                                    <td>{{$valuecate['id']}}</td>
                                    <td>{{$valuecate['category_name']}}</td>
                                    <td>
                                        <a href="{{url('category/edit-category').'/'.$valuecate['id']}}"> <button type="submit"  class="btn btn-primary m-t-15 waves-effect">Edit</button></a>
                                        <button type="submit"  class="btn btn-info m-t-15 waves-effect">Delete</button>
                                        <a href="{{url('category/view-category-items').'/'.$valuecate['bucket_cat'].'/'.$valuecate['id']}}"> <button type="submit"  class="btn bg-green m-t-15 waves-effect">
                                            View Item</button></a>
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->

        </div>
    </section>

    <script src="{{ URL::asset('public/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>


@endsection
