@extends('layouts.home')

@section('content')
<div class="container-fluid ">
    <div class="row justify-content-center">
        @if (Session::has('message'))
        <div class=" col-sm-12   text-white text-center">
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
        <div class="col-sm-8     pb-3">
            <div class="card ">
                <div class="p-2 d-flex justify-content-center pt-3">
                    <div>
                        @if($details->image == null)
                        <img src="{{asset('img/NoImage.jpg')}}" class="card-img-top " alt="Product Image" style="width: 310px; height:200px">
                        @endif
                        @if($details->image != null)
                        <img src="{{asset('storage/' . $details->image)}}" class="card-img-top" alt="Product Image" style="width: 310px; height:200px">
                        @endif
                        @if(!Auth::guest())
                        @if(Auth::user()->id == $owner_details->id)
                        <div class="d-flex justify-content-between p-3">
                            <p class="pr-5">
                                <a href="/home/user/products/{{$details->id}}/edit" class="btn btn-edit text-white ">
                                    Edit
                                </a>
                            </p>
                            <p class="pr-5">
                            <form method="POST" action="/home/user/products/{{$details->id}}">
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                                @csrf
                            </form>
                            </p>
                        </div>
                        @endif
                        @endif
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
                        <label class="pt-1">Condition:<strong>{{$details->productCondition->type}}</strong></label>
                    </div>
                    @if($details->service == NULL)
                    <div class="card-text p-1">
                        <label class="pt-1"> <strong>This is a Product</strong></label>
                    </div>
                    @endif
                    @if($details->service == 1)
                    <div class="card-text p-1">
                        <label class="pt-1">
                            <strong> This is a Service</strong>
                        </label>
                    </div>
                    @endif
                    @if($details->discount == NULL)
                    <div class="card-text p-1">
                        @if($details->service == NULL)
                        <label class="pt-1">
                            <strong>This Product is not discount</strong>
                        </label>
                        @endif
                        @if($details->service == 1)
                        <label class="pt-1">
                            <strong>This Service is not discount</strong>
                        </label>
                        @endif

                    </div>
                    @endif
                    @if($details->discount == 1)
                    <div class="card-text p-1">

                        @if($details->service == NULL)
                        <label class="pt-1">
                            <strong>This Product is on discount</strong></label>
                        @endif
                        @if($details->service == 1)
                        <label class="pt-1">
                            <strong>This Service is on discount</strong></label>
                        @endif
                    </div>
                    @endif
                    @if($details->in_stocked == 1)
                    <div class="card-text p-1">

                        @if($details->service == NULL)
                        <label class="pt-1">
                            <strong>This Product is in stocked</strong></label>
                        @endif
                        @if($details->service == 1)
                        <label class="pt-1">
                            <strong>This Service is in stocked</strong></label>
                        @endif
                    </div>
                    @endif
                    @if($details->in_stocked == NULL)
                    <div class="card-text p-1">

                        @if($details->service == NULL)
                        <label class="pt-1">
                            <strong>This Product is not stocked</strong></label>
                        @endif
                        @if($details->service == 1)
                        <label class="pt-1">
                            <strong>This Service is not stocked</strong></label>
                        @endif
                    </div>
                    @endif
                    @if($details->publisded == 1)
                    <div class="card-text p-1">

                        @if($details->service == NULL)
                        <label class="pt-1">
                            <strong>This Product has been published</strong></label>
                        @endif
                        @if($details->service == 1)
                        <label class="pt-1">
                            <strong>This Service has been published</strong></label>
                        @endif
                    </div>
                    @endif
                    @if($details->published == NULL)
                    <div class="card-text p-1">

                        @if($details->service == NULL)
                        <label class="pt-1">
                            <strong>This Product has not been published</strong></label>
                        @endif
                        @if($details->service == 1)
                        <label class="pt-1">
                            <strong>This Service has not been published</strong></label>
                        @endif
                    </div>
                    @endif
                    @if($details->published == 1)
                    <div class="card-text p-1">

                        @if($details->service == NULL)
                        <label class="pt-1">
                            <strong>This Product has been published</strong></label>
                        @endif
                        @if($details->service == 1)
                        <label class="pt-1">
                            <strong>This Service has been published</strong></label>
                        @endif
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
    <style scoped>
        .btn-edit {
            background-color: darkcyan;
        }
    </style>
    @endsection