@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-1">
        <div class="col-8 col-md-8 col-xs-12 col-sm-12 pt-2">
            <div class="card">
                <div class="card-header bg-primary bg-gradient">
                    <h4 class="fw-bold text-center text-white">Update Product Details</h5>
                </div>
                @for($i =0; $i < 1; $i++) <div class="card-body">
                    <form class="form" method="POST" action="/user/products/{{$product_details[$i]->product_id}}">
                        @method('PATCH')
                        <div class="row rounded-border   pb-2">
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Product
                            </div>
                            <div class=" pb-2   col-12 col-sm-12 col-lg-12 col-xs-12">
                                <select class="form-control" required name="product_id" id="product_id" value="{{old('product_id') ?? $product_details[$i]->product_id}}">
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row rounded-border  pb-2 ">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Price (CFA)
                            </div>
                            <div class=" pb-2   col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="price" id="price" required value="{{ old('price')?? $product_details[$i]->price}}">
                            </div>

                        </div>
                        <div class="row rounded-border   pb-3">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal">Quantity</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <input type="number" class="form-control" name="quantity" id="quantity" required value="{{old ('quantity')?? $product_details[$i]->quantity}}">
                            </div>

                        </div>
                        <div class="row rounded-border   pb-3">
                            <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
                                <h6 class="fw-normal">Description</h6>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
                                <textarea class="form-control" id="description" name="description" rows="3">{{old('description') ?? $product_details[$i]->description}}</textarea>
                            </div>

                        </div>
                        <div class="row rounded-border   pb-2">
                            <div class="col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
                                Category
                            </div>
                            <div class=" pb-2   col-12 col-sm-12 col-lg-12 col-xs-12">
                                <select class="form-control" required name="category_id" id="category_id" value="{{ old('category_id') ?? $product_details[$i]->category_id}}">
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
                                <select class="form-control" required name="manufactural_id" id="manufactural_id" value="{{ old('manufactural_id') ?? $product_details[$i]->manufactural_id}}">

                                    @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer->id}}">{{$manufacturer->manufacturer_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                        </div>
                        @csrf
                    </form>
            </div>
            @endfor
        </div>
    </div>
</div>
</div>
@endsection