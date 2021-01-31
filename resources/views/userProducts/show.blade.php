@extends('layouts.home')

@section('content')
<div class="container ">
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
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-8 col-md-8 co-lg-8 col-xs-12 col-sm-12   pb-3">
            <div class="card ">
                <div class="p-2 d-flex justify-content-center">
                    <div>
                        <img src="{{asset('img/user.png')}}" class="card-img-top" alt="Product Image" style="width: 130px; height:130px">
                        <div class="d-flex justify-content-between p-3">
                            <p>
                                <a href="/user/products/{{$details->id}}/edit" class="btn btn-outline-primary" data-toggle="tooltip" title="Edit Product">
                                    <i class="fas fa-edit">
                                    </i>
                                </a>
                            </p>
                            <p>
                            <form method="POST" action="/user/products/{{$details->id}}">
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
                <div class="card-body">
                    <div class="card-text p-1"><label>Product Name: <strong> {{$details->product_name}}</strong></label>

                    </div>
                    <div class="card-text p-1">
                        <label class="pt-1">Description:</label>
                        <div class="rounded border p-2 border-raduis"><strong>{{$details->description}}</strong></div>
                    </div>

                    <div class="card-text p-1">
                        <label>Quantity in Stock: <strong>{{$details->quantity}}</strong> </label>
                    </div>
                    <div class="card-text p-1">
                        <label class="pt-1">Price: <strong>{{$details->price}}</strong></label>
                    </div>

                    <div class="card-text p-1">
                        <label class="pt-1">Condition: <strong>{{$details->productCondition->type}}</strong></label>
                    </div>
                    @if($details->service == NULL)
                    <div class="card-text p-1">
                        <label class="pt-1">Service: <strong>Not a Service</strong></label>
                    </div>
                    @endif
                    @if($details->service == 1)
                    <div class="card-text p-1">
                        <label class="pt-1">Discount: <strong> A Service</strong></label>
                    </div>
                    @endif
                    @if($details->discount == NULL)
                    <div class="card-text p-1">
                        <label class="pt-1">Discount: <strong>This Product has no discount</strong></label>
                    </div>
                    @endif
                    @if($details->discount == 1)
                    <div class="card-text p-1">
                        <label class="pt-1">Discount: <strong>On Discount</strong></label>
                    </div>
                    @endif
                    @if($details->in_stocked == 1)
                    <div class="card-text p-1">
                        <label class="pt-1">In Stocked: <strong>In Stocked</strong></label>
                    </div>
                    @endif
                    @if($details->in_stocked == NULL)
                    <div class="card-text p-1">
                        <label class="pt-1">In Stocked: <strong>Not Stocked</strong></label>
                    </div>
                    @endif
                    @if($details->published == 1)
                    <div class="card-text p-1">
                        <label class="pt-1">Published: <strong>Published</strong></label>
                    </div>
                    @endif
                    @if($details->published == NULL)
                    <div class="card-text p-1">
                        <label class="pt-1">Published: <strong>Not Published</strong></label>
                    </div>
                    @endif
                    <div class="card-text p-1">
                        <label class="pt-1">Name of Vendor: <strong>{{$owner_details->name}}</strong></label>
                    </div>
                    <div class="card-text p-1">
                        <label class="pt-1">Email Address of Vendor: <strong>{{$owner_details->email}}</strong></label>
                    </div>
                    <div class="card-text p-1">
                        <label class="pt-1">Contact Number of Vendor: <strong>{{$owner_details->telephone}}</strong></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection