<!doctype html>
<html lang="ja">
<head>
    <link href="/css/app.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
<h1>Hello/Index</h1>
<p>{{$msg}}</p>
<table border="1">
    @foreach($data as $item)
        <tr>
            <th>{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->age}}</td>
        </tr>
    @endforeach
</table>
<hr>
</body>
</html>


<style>
    th  { background-color: red; padding: 10px; }
    td  { background-color: #eee; padding: 10px; }
</style>
