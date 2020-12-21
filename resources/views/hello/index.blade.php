{{--DBとクエリビルダの動作確認用--}}
    <!doctype html>
<html lang="ja">
<head>
    <link href="/css/app.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
<h1>Hello/Index</h1>
<p>{{$msg}}</p>
<ol>
    @foreach($data as $item)
        <li>{{$item->name}} [{{$item->email}},{{$item->age}}]</li>
    @endforeach
</ol>
{!! $data->links() !!}
</body>
</html>


<style>
    th  { background-color: red; padding: 10px; }
    td  { background-color: #eee; padding: 10px; }
</style>
