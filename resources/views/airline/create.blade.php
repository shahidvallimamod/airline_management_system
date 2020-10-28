<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('airlines.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">نام ایرلاین</label>
            <input type="text" name="name">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="file" name="logo">
            @error('logo')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="submit" value="ذخیره">
        </div>
    </form>
</body>
</html>
