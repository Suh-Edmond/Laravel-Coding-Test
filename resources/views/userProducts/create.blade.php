@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-1">
        <div class="col-7 col-md-7 col-xs-12 col-sm-12 pt-2">
            <div class="card">
                <div class="card-header bg-primary bg-gradient">
                    <h4 class="fw-bold text-center text-white">Add Product to Stock</h5>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="/user/products" enctype="multipart/form-data">
                        @include('Form.product')
                        <div class=" d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <style scoped>
        .checkbox1 {
            transform: scale(1);
            -webkit-transform: scale(1);
        }

        .checkbox1 {
            transform: scale(1.5);
            -webkit-transform: scale(1.5);
        }

        .btn {
            width: 11rem;
        }
    </style>
    @endsection