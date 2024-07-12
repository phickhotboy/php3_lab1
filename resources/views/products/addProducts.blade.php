<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thêm sản phẩm mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center">Thêm sản phẩm mới</h2>
    <form action="{{ route('products.addPostProducts') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="form-label">Tên sản phẩm</label><br>
            <input type="text" class="form-control" id="name" name="name"><br>
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
            <input type="text" class="form-control" id="price" name="price"><br>
        </div>
        <div class="mb-6">
            <label for="view" class="form-label">Lượt xem</label><br>
            <input type="text" class="form-control" id="view" name="view"><br><br>
        </div>
        <input class="btn btn-success" type="submit" value="Thêm">
        <a class="btn btn-primary" href="/products/list-products">Trang chủ</a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
