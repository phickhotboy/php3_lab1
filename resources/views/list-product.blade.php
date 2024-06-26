<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Xin chao tat ca cac ban</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key )
                <tr>
                    <td>{{$key['id']}} </td>
                    <td>{{$key['name']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>