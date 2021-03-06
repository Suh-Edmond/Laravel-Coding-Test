@extends('layouts.home')

@section('content')
<div class="container-fluid">
    <div class="row pt-1">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 pt-2">
            <div class="card">
                <div class="card-header    ">
                    <h4 class="fw-bold text-center text-white">Add Product to Stock</h5>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="/home/user/products" enctype="multipart/form-data">
                        @include('Form.product')
                        <div class=" d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline text-white">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
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
            background-color: darkcyan;

        }

        .card-header {
            background-color: darkcyan;
        }
    </style>
    @endsection