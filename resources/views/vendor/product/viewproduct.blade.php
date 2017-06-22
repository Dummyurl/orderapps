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
                                    <th>Items Variant</th>
                                    <th>Items Price</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($products as $keypro => $valuepro)
                                    @if(isset($valuepro['product_attr_pricing']))
                                         @foreach($valuepro['product_attr_pricing'] as $key_attr => $value_attr)
                                             <tr>
                                                 <td>{{$valuepro['product_name']}}</td>
                                                 <td>{{$valuepro['category']}}</td>
                                                 <td>{{$value_attr['product_attribute_name']}}</td>
                                                 <td>{{$value_attr['product_attribute_price']}}</td>
                                                 <td>
                                                     <button type="submit"  class="btn btn-primary m-t-15 waves-effect">Edit</button>
                                                     <button type="submit"  class="btn btn-info m-t-15 waves-effect">Delete</button>
                                                 </td>
                                             </tr>
                                         @endforeach
                                    @else
                                    <tr>

                                        <td>{{$valuepro['product_name']}}</td>
                                        <td>{{$valuepro['category']}}</td>
                                        <td> </td>
                                        <td>{{$valuepro['product_price']}}</td>
                                        <td>
                                            <button type="submit"  class="btn btn-primary m-t-15 waves-effect">Edit</button>
                                            <button type="submit"  class="btn btn-info m-t-15 waves-effect">Delete</button>
                                        </td>
                                    </tr>
                                    @endif

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
