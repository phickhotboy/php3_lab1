<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center">Đôi chút về bản thân mình</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Ten</th>
                <th>Tuoi</th>
                <th>MSSV</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sinhvienfpt as $key )
                <tr>
                    <td>{{$key['ten']}} </td>
                    <td>{{$key['tuoi']}}</td>
                    <td>{{$key['mssv']}}</td>
                    <td>{{$key['email']}}</td>
                    <td>
                        <a href="#">Xoa</a>
                    </td>
                    <td>
                        <a href="#">Sua</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>