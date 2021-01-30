@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-1">
        <div class="col-7 col-md-7 col-xs-12 col-sm-12 pt-2">
            <div class="card">
                <div class="card-header bg-primary bg-gradient">
                    <h4 class="fw-bold text-center text-white">Add Product to StockS</h5>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="/user/products">
                        <div class="row rounded-border   pb-2">
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Product Name *
                            </div>
                            <div class=" pb-2   col-8 col-md-8 col-sm-12 col-lg-8 col-xs-12">
                                <select class="form-control" required name="product_id" id="product_id">

                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 col-md-4 col-sm-12 col-lg-4 col-xs-12">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Create New Product
                                </button>

                            </div>
                        </div>
                        <div class="row rounded-border  pb-2 ">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Product Price (CFA)*
                            </div>
                            <div class=" pb-2   col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="price" id="price" required value="{{$product->price}}">
                            </div>

                        </div>
                        <div class="row rounded-border   pb-3">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal">Quantity *</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="quantity" id="quantity" required>
                            </div>

                        </div>
                        <div class="row rounded-border   pb-3">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal">Description</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>

                        </div>
                        <div class="row rounded-border   pb-2">
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Category
                            </div>
                            <div class=" pb-2   col-12 col-sm-12 col-lg-12 col-xs-12">
                                <select class="form-control" required name="category_id" id="category_id">
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row rounded-border   pb-2">
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Manufacturer
                            </div>
                            <div class=" pb-2   col-12 col-sm-12 col-lg-12 col-xs-12">
                                <select class="form-control" required name="manufactural_id" id="manufactural_id">
                                    <option>Select Manufacturer</option>
                                    @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary bg-gradient text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form" method="POST" action="/user/products/add">
                    <div class="modal-body">
                        <form class="form" method="POST" action="/user/products/add">
                            <div class="row rounded-border   pb-3">
                                <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                    <h6 class="fw-normal">Product Name</h6>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                    <input type="text" class="form-control" name="product_name" id="product_name" required>
                                </div>

                            </div>
                            <div class="row rounded-border   pb-3">
                                <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                    <h6 class="fw-normal">Product Price</h6>
                                </div>
                                <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                    <input type="number" class="form-control" name="price" id="price" required>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="submit" class="btn btn-primary">Save</button>

                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @endsection