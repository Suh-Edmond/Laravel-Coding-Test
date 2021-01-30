@extends('layouts.app')


@section('content')
<div class="container pt-5">

    <div class="row justify-content-center">
        @if (Session::has('message'))
        <div class="col-6 col-md-6 col-lg-6 col-xs-12 col-sm-12 text-whiten text-center">
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ Session::get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
        @endif
        @if (Session::has('message_delete'))
        <div class="col-6 col-md-6 col-lg-6 col-xs-12 col-sm-12 text-whiten text-center">
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ Session::get('message_delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
        @endif
    </div>
    <div class="row d-flex justify-content-center border">
        @foreach($user_products as $user_product)
        <div class="col-3 col-md-3 co-lg-3 col-xs-12 col-sm-12  pt-3 pb-3 px-3">
            <div class="card">
                <div class="p-4">
                    <img src="{{asset('img/user.png')}}" class="card-img-top" alt="Product Image">
                </div>
                <div class="card-body">
                    <div><label>Name: </label>
                        <span class="pr-5"><strong> {{$user_product->product_name}}</strong></span>
                    </div>
                    <div class="card-text">
                        <label>Price: <strong>{{$user_product->price}}</strong> </label>
                    </div>
                </div>
                <div class="card-footer">
                    <p><a href="/user/products/{{$user_product->id}}">See more</a></p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row justify-content-center pt-3">
            <div>
                {{$user_products->links('pagination::bootstrap-4')}}
            </div>
        </div>
        @if(count($user_products) == null)
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>You don't have any Product</strong> <a href="/user/products/add" class="alert-link">Add Product</a>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>
<style scoped>
    a {
        text-decoration: none;
    }
</style>
@endsection