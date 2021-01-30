@extends('layouts.app')


@section('content')
<div class="container pt-5">
    <div class="row   d-flex justify-content-center border">
        @if($products != "[]")
        @foreach($products as $product)
        <div class="col-3 col-md-3 co-lg-3 col-xs-12 col-sm-12  pt-3 pb-3 px-3">
            <div class="card">
                <div class="p-4">
                    <img src="{{asset('img/user.png')}}" class="card-img-top" alt="Product Image">
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
        @endif
    </div>
    <div class="row pt-5">
        <div class="d-flex justify-content-center">
            <div>Bridge Africa Ventures is a company that helps businesses create digital identities.Do you want to advertise your product? join this group</div>
        </div>
    </div>
    <div class="row p-4">
        <div class=" d-flex justify-content-center">
            <a class="btn btn-outline-primary" href="user/login" role="button">Get Started</a>
        </div>
    </div>
</div>
<style scoped>
    a {
        text-decoration: none;
    }
</style>
@endsection