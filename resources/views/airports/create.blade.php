<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('airports.store')}}" method="post">
        @csrf
        <div>
            <label for="name">نام فرودگاه</label>
            <input type="text" name="name">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="ذخیره">
        </div>
    </form>
</body>
</html>
