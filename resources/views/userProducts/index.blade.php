@extends('layouts.home')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-sm-12 p-3 d-flex justify-content-end pr-4">
            <a class="btn text-white" href="/home/user/products/add" role="button">Add Product</a>
        </div>
    </div>
    <div class="row justify-content-center">
        @if (Session::has('message'))
        <div class="col-sm-12 text-white text-center">
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ Session::get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
        @endif
    </div>
    <div class="row justify-content-center">
        @if (Session::has('message_delete'))
        <div class=" col-sm-12 text-whiten text-center">
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ Session::get('message_delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
        @endif
    </div>
    <div class="row border  pt-2">
        @foreach($products as $user_product)
        <div class="col-sm-4   pt-1">
            <div class="card mb-3">
                <div class="p-4 d-flex justify-content-center">
                    @if($user_product->image == null)
                    <img src="{{asset('img/NoImage.jpg')}}" class="card-img-top " alt="Product Image" style="width: 200px; height:200px">
                    @endif
                    @if($user_product->image != null)
                    <img src="{{asset('storage/' . $user_product->image)}}" class="card-img-top" alt="Product Image" style="width: 200px; height:200px">
                    @endif
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
                    <p><a href="/home/user/products/{{$user_product->id}}">See more >>></a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @if(count($products) == null)
    <div class=" row d-flex justify-content-center alert alert-info alert-dismissible fade show mx-1" role="alert">
        <strong>Sorry! You don't have any Product</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row justify-content-center pt-3 pl-4">
        <div>
            <p>{{$products->links('pagination::bootstrap-4')}}</p>

            <p class="text-primary"> {{ $products->firstItem() }} to {{ $products->lastItem() }} entries of total {{$products->total()}} entries</p>
        </div>
    </div>
</div>
<style scoped>
    a {
        text-decoration: none;
    }

    .btn {
        background-color: darkcyan;
    }
</style>
@endsection