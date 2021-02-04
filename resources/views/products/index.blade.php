@extends('layouts.app')


@section('content')
<div class="container-fluid  ">
    <div class="row d-flex justify-left">
        <div class="col-sm-6 pl-3">
            <h3 class="fw-bolder pl-3"><strong>Our Products </strong></h3>
        </div>
        <div class="col-sm-6"></div>
    </div>
    <div class="row border  pt-2">
        @foreach($products as $product)
        <div class="col-sm-4 pt-1">
            <div class="card mb-3">
                <div class="p-4 d-flex justify-content-center">
                    @if($product->image == null)
                    <img src="{{asset('img/NoImage.jpg')}}" class="card-img-top " alt="Product Image" style="width: 200px; height:200px">
                    @endif
                    @if($product->image != null)
                    <img src="{{asset('storage/' . $product->image)}}" class="card-img-top" alt="Product Image" style="width: 200px; height:200px">
                    @endif
                </div>
                <div class="card-body">
                    <div><label>Product Name: </label>
                        <span><strong> {{$product->product_name}}</strong></span>
                    </div>
                    <div class="card-text">
                        <label>Price: <strong>{{$product->price}} CFA</strong> </label>
                    </div>
                </div>
                <div class="card-footer">
                    <p><a href="/home/user/products/{{$product->id}}">See more >>></a></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center pt-3 pl-4">
        <div>
            <p class="fw-bolder"> {{$products->links('pagination::bootstrap-4')}}</p>
            <p class="text-primary"> {{ $products->firstItem() }} to {{ $products->lastItem() }} entries of total {{$products->total()}} entries</p>
        </div>
    </div>
    <div class=" row mx-3 d-flex justify-content-center">
        <div class="pt-5">
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
    <footer class="main-footer d-flex justify-content-center">
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