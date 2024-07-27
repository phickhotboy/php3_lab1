<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Sửa sản phẩm</h2>
    <form action="{{ route('products.updatePostProducts') }}" method="POST">
        <input name="productId" type="hidden" value="{{ $product->id }}">
        @csrf
        <div class="mb-6">
            <label for="name" class="form-label">Tên sản phẩm</label><br>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}"><br>
        </div>
        <div class="mb-6">
            <label for="category_id" class="form-label">Danh mục</label><br>
            <select name="category_id" class="form-control" >
                @foreach ($category as $value)
                    <option value="{{ $value->id }}">
                        {{ $value->name }}
                    </option>
                @endforeach
            </select> <br>
        </div>
        <div class="mb-6">
            <label for="price" class="form-label">Giá</label><br>
            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}"><br>
        </div>
        <div class="mb-6">
            <label for="view" class="form-label">Lượt xem</label><br>
            <input type="text" class="form-control" id="view" name="view" value="{{ $product->view }}"><br><br>
        </div>
      
        <input class="btn btn-warning" type="submit" value="Cập nhật">
        <a class="btn btn-primary" class="form-control" href="/products/list-products">Trang chủ</a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
