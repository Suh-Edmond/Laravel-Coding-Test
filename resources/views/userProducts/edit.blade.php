@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-1">
        <div class="col-8 col-md-8 col-xs-12 col-sm-12 pt-2">
            <div class="card">
                <div class="card-header bg-primary bg-gradient">
                    <h4 class="fw-bold text-center text-white">Update Product Details</h5>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="/user/products/{{$product->id}}">
                        @method('PATCH')
                        @include('Form.productUpdate')
                        <div class=" d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection