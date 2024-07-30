<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dang nhap</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    
    <div class="container mt-5">
        <h4 class="text-center">Dang ky</h4>
        @if(session('message'))
            <p class="text-danger text-center">{{ session('message') }}</p>
        @endif
        <form action="{{ route('postRegister') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="email" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            {{-- <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control" id="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <textarea class="form-control" placeholder="Điền thông tin của bạn ...." name="address" id="" cols="30" rows="10"></textarea> --}}
            <button class="btn btn-primary">Dang ky</button>
        </form>
        <a href="{{ route('login')}}"><button class="btn btn-success">Dang nhap</button></a>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>