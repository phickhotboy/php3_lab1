@extends('admin/layout/default')
@section('title')
@parent
Chinh sua sản phẩm
    
@endsection

@section('content')
<div class="p-4" style="min-height: 800px;">
    <form action="{{route('admin.products.updatePostProduct', $product->product_id)}}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="nameProduct" id="" value="{{$product->name}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" name="priceProduct" id="" value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">View</label>
            <input type="text" class="form-control" name="viewProduct" id="" value="{{$product->view}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control" name="descriptionProduct" id="" value="{{$product->description}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="imageSP" id="imageSP">
            <img src="{{asset($product->image)}}" alt="" style="width:50px">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Sua</button>
    </form>
</div>
    
@endsection