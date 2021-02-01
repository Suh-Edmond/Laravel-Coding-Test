@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row d-flex justify-left">
        <div class="col-4 col-md-4 col-sm-12 col-xs-12 p-2">
            <h3 class="fw-bolder"><strong>Products </strong></h3>
        </div>
    </div>
    <div class="row   d-flex justify-content-center border">

        @foreach($products as $product)
        <div class="col-3 col-md-3 co-lg-3 col-xs-12 col-sm-12  pt-3 pb-3 px-3">
            <div class="card">
                <div class="p-4">
                    <img src="{{asset('img/laptop.jpeg')}}" class="card-img-top" alt="Product Image">
                </div>
                <div class="card-body">
                    <div><label>Product Name: </label>
                        <span class="pr-5"><strong> {{$product->product_name}}</strong></span>
                    </div>
                    <div class="card-text">
                        <label>Price: <strong>{{$product->price}}</strong> </label>
                    </div>
                </div>
                <div class="card-footer">
                    <p><a href="/user/products/{{$product->id}}">See more</a></p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center pt-3">
            <div>
                {{$products->links('pagination::bootstrap-4')}}
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-center">
        <div class="row pt-5">
            <div>
                <div>
                    <p>Bridge Africa Ventures is a company that helps businesses create digital identities.</p>
                    <p>Do you want to advertise your product? join this group
                    <p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row p-4">
            <div>
                <a class="btn btn-outline-primary" href="/login" role="button">Get Started</a>
            </div>
        </div>
    </div>
    <footer class="main-footer p-5 d-flex justify-content-center">
        <strong>Copyright &copy; 2021.</strong>
        All rights reserved.
    </footer>

</div>
<style scoped>
    a {
        text-decoration: none;
    }
</style>
@endsection