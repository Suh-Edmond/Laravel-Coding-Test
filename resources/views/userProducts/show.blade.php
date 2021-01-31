@extends('layouts.home')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        @if (Session::has('message_update'))
        <div class="col-6 col-md-6 col-lg-6 col-xs-12 col-sm-12 text-whiten text-center">
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ Session::get('message_update') }}</strong>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        </div>
        @endif
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8 col-md-8 co-lg-8 col-xs-12 col-sm-12   pb-3">
            <div class="card ">
                <div class="p-2 d-flex justify-content-center">
                    <div>
                        <img src="{{asset('img/user.png')}}" class="card-img-top" alt="Product Image" style="width: 130px; height:130px">
                        <div class="d-flex justify-content-between p-3">
                            <p>
                                <a href="/user/products/{{$id}}/edit" class="btn btn-outline-primary" data-toggle="tooltip" title="Edit Product">
                                    <i class="fas fa-edit">
                                    </i>
                                </a>
                            </p>
                            <p>
                            <form method="POST" action="/user/products/{{$id}}">
                                @method("DELETE")
                                <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="Delete Product">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @csrf
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
                @if($product != "[]")
                @for($i =0; $i < 1; $i++) <div class="card-body">
                    <div class="card-text p-1"><label>Product Name: <strong> {{$product[$i]->product_name}}</strong></label>

                    </div>
                    @if($product[$i]->description == null)
                    <div class="card-text p-1">
                        <label class="pt-1">Description:</label>
                        <div class="rounded border p-2 border-raduis"><strong>No Description for this Product</strong></div>
                    </div>
                    @endif
                    @if($product[$i]->description != null)
                    <div class="card-text p-1">
                        <label class="pt-1">Description:</label>
                        <div class="rounded border p-2 border-raduis"><strong>{{$product[$i]->description}}</strong></div>
                    </div>
                    @endif
                    <div class="card-text p-1">
                        <label>Quantity in Stock: <strong>{{$product[$i]->quantity}}</strong> </label>
                    </div>
                    <div class="card-text p-1">
                        <label class="pt-1">Price: <strong>{{$product[$i]->price}}</strong></label>
                    </div>
                    <div class="card-text p-1">
                        <label class="pt-1">Name of Vendor: <strong>{{$product[$i]->name}}</strong></label>
                    </div>
                    <div class="card-text p-1">
                        <label class="pt-1">Email Address of Vendor: <strong>{{$product[$i]->email}}</strong></label>
                    </div>
                    @endfor
                    @endif
            </div>

        </div>
    </div>
</div>
</div>
@endsection