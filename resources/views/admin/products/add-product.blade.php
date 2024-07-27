@extends('admin/layout/default')
@section('title')
@parent
Thêm sản phẩm
    
@endsection

@section('content')
<div class="p-4" style="min-height: 800px;">
    <form action="{{route('admin.products.addPostProduct')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="nameProduct" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" name="priceProduct" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">View</label>
            <input type="text" class="form-control" name="viewProduct" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <input type="text" class="form-control" name="descriptionProduct" id="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="imageSP" id="imageSP">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Them moi</button>
    </form>
</div>
    
@endsection