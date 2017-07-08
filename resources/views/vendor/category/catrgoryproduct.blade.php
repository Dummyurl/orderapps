@extends('app')

@section('main-content')

    <section class="content">


        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    CATEGORY PRODUCTS
                </h2>
            </div>


            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>{{$products[0]['category']}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            @if($buk_id == 0)
                            <ul class="list-group">
                                @foreach($products as $key_pro => $value_pro)
                                    @if(isset($value_pro['product_attr_pricing']))
                                        <li class="list-group-item">
                                            <h5>    {{$value_pro['product_name']}}</h5>
                                            <ul class="list-group">
                                        @foreach($value_pro['product_attr_pricing'] as $key_attr => $value_attr)
                                      <li class="list-group-item">
                                          {{$value_attr['product_attribute_name']}}<span class="badge bg-pink">  ${{$value_attr['product_attribute_price']}}
                                          </span></li>

                                          @endforeach
                                            </ul>
                                        </li>
                                     @else

                                        <li class="list-group-item ">
                                            <h5> {{$value_pro['product_name']}}
                                            <span class="badge bg-pink" style="float: right;margin-right: 15px;">  ${{$value_pro['product_price']}}
                                          </span></h5></li>

                                    @endif


                                @endforeach

                                {{--<li class="list-group-item">Dapibus ac facilisis in</li>--}}
                                {{--<li class="list-group-item">Morbi leo risus</li>--}}
                                {{--<li class="list-group-item">Porta ac consectetur ac</li>--}}
                                {{--<li class="list-group-item">Vestibulum at eros</li>--}}
                            </ul>
                            @else
                                <ul class="list-group">
                                    @foreach($products as $key_pro => $value_pro)
                                        <li class="list-group-item">
                                            <h5> {{$value_pro['bucket_name']}}
                                            <span class="badge bg-pink" style="float: right;margin-right: 15px;">{{$value_pro['bucket_price']}}</span>
                                            </h5>

                                                <p class="l6">{{$value_pro['bucket_description']}}</p>

                                        </li>

                                    @endforeach


                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
