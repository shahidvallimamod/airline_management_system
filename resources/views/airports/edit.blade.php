<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('airports.update', $data->id)}}" method="post">
    @csrf
    @method('put')
    <div>
        <label for="name">نام فرودگاه</label>
        <input type="text" name="name" value="{{$data->name}}">
        @error('name')
        <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <input type="submit" value="ذخیره">
    </div>
</form>

<form action="{{route('airports.destroy', $data->id)}}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="حذف">
</form>
</body>
</html>
