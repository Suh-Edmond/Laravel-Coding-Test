  <div class="row rounded-border   pb-2">
      <div class="col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
          Product Name*
      </div>
      <div class=" pb-2   col-8 col-md-8 col-sm-12 col-lg-8 col-xs-12">
          <input type="text" class="form-control" name="product_name" id="product_name" required value="{{ old('product_name') ?? $product->product_name}}">
      </div>
      <div class="col-4 col-md-4 col-sm-12 col-lg-4 col-xs-12">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Product Image
          </button>

      </div>
  </div>
  <div class="row rounded-border  pb-2 ">
      <div class=" col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
          Product Price* (CFA)
      </div>
      <div class=" pb-2   col-12 col-sm-12 col-lg-12 col-xs-12">
          <input type="number" class="form-control" name="price" id="price" required value="{{ old('price') ?? $product->price}}">
      </div>

  </div>
  <div class="row rounded-border   pb-3">
      <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
          <h6 class="fw-normal">Quantity*</h6>
      </div>
      <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
          <input type="number" class="form-control" name="quantity" id="quantity" required value="{{old ('quantity') ?? $product->quantity}}">
      </div>

  </div>
  <div class="row rounded-border   pb-3">
      <div class=" col-12 col-sm-12 col-lg-12 col-xs-12  ">
          <h6 class="fw-normal">Description*</h6>
      </div>
      <div class="col-12 col-sm-12 col-lg-12 col-xs-12">
          <textarea class="form-control" id="description" name="description" rows="4" placeholder="Please give a description of your product">{{old('description') ?? $product->description }}</textarea>
      </div>

  </div>
  <div class="row rounded-border   pb-2">
      <div class="col-12 col-sm-12 col-lg-12 col-xs-12 h6 fw-normal ">
          Conditions*
      </div>
      <div class=" pb-2   col-12 col-sm-12 col-lg-12 col-xs-12">
          <select class="form-control" required name="product_condition_id" id="product_condition_id">
              @foreach($conditions as $condition)
              <option value=" {{$condition->id}}" {{ $condition->id == $product->product_condition_id ? 'selected': ''}}>{{$condition->type}}</option>
              @endforeach
          </select>
      </div>
  </div>

  <div class="form-check ">
      <label class="pr-5">This Product is on discount ?
      </label>
      <input class="form-check-input checkbox1" type="checkbox" name="discount" id="discount" value="1" {{$product->discount ==1 ?'checked':'NULL'}}>
  </div>

  <div class="form-check ">
      <label class="pr-5">In Stock ?
      </label>
      <input class="form-check-input checkbox1" type="checkbox" name="in_stocked" id="in_stocked" value="1" {{ $product->in_stocked == 1 ? 'checked': 'NULL'}}>
  </div>

  <div class="form-check ">
      <label class="pr-5">Published ?
      </label>
      <input class="form-check-input checkbox1" type="checkbox" name="published" id="published" value="1" {{$product->published == 1 ? 'checked':'NULL'}}>
  </div>
  <div class="form-check ">
      <label class="pr-5">This Product is a Service ?</label>
      <input class="form-check-input checkbox1" type="checkbox" name="service" id="service" value="1" {{$product->service == 1 ? 'checked':'NULL'}}>
  </div>


  @csrf