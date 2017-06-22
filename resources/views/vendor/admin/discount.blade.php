@extends('app')

@section('main-content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DISCOUNT</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Discount
                            </h2>
                        </div>
                        <div class="body">
                            <form method="POST" id="add_attribute" action="{{url('/add-new-discount')}}" novalidate="novalidate">
                                {{csrf_field()}}
                                <label class="form-label">Discount</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="id" value="{{(isset($discount[0]['id'])) ? $discount[0]['id']:''}}" required class="form-control">
                                        <input type="text" name="discount" value="{{(isset($discount[0]['discount'])) ? $discount[0]['discount']:''}}" required class="form-control">

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Add Discount</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
