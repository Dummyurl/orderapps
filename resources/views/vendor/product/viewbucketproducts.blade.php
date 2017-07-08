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
                                Items
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-responsive table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>Items Name</th>
                                    <th>Category Name</th>
                                    <th>Items Price</th>
                                    <th>Items Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($products as $keypro => $valuepro)
                                            <tr>
                                                <td>{{$valuepro['bucket_name']}}</td>
                                                <td>{{$valuepro['category']}}</td>
                                                <td>{{$valuepro['bucket_price']}}</td>
                                                <td>{{$valuepro['bucket_description']}}</td>
                                                <td>
                                                 <a href="{{url('product/edit-bucket-product').'/'.$valuepro['id']}}"><button type="submit"  class="btn btn-primary m-t-15 waves-effect">Edit</button></a>
                                                    <button type="submit"  class="btn btn-info m-t-15 waves-effect">Delete</button>
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
