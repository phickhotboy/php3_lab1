@extends('admin/layout/default')
@section('title')
@parent
Danh sách sản phẩm
    
@endsection
@section('content')
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
    <a href="{{route('admin.products.addProduct')}}"><button class="btn btn-info">Thêm mới</button></a>
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                {{-- <th scope="col">STT</th> --}}
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">Lượt xem</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listProduct as $key => $value)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->view}}</td>
                <td>{{$value->description}}</td>
                <td>
                    <img class="img-product" width="100px" src="{{asset($value->image)}}">
                </td>
                <td>
                    <a href="{{route('admin.products.updateProduct', $value->product_id)}}" class='btn btn-warning'>Sua</a>
                    <form action="{{route('admin.products.deleteProduct', $value->product_id)}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick=" return confirm('Ban co muon xoa khong ?')" class="btn btn-danger">Xoa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$listProduct->links('pagination::bootstrap-5')}}
</div>
@endsection