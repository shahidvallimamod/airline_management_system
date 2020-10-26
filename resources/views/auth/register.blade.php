<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    @endif
    <form action="{{route('register')}}" method="post">
        @csrf
        <div>
            <label for="">mobile number</label>
            <input type="text" name="mobile" value="{{old('mobile')}}">
        </div>

        <div>
            <label for="">password</label>
            <input type="text" name="password">
        </div>

        <div>
            <label for="">password confirm</label>
            <input type="text" name="password_confirmation">
        </div>

        <div>
            <label for="">gender</label>
            <label for="gender0">male</label>
            <input type="radio" value="0" name="gender" id="gender0" @if(old('gender') === '0') checked="checked" @endif>
            <label for="gender1">female</label>
            <input type="radio" value="1" name="gender" id="gender1" @if(old('gender') === '1') checked="checked" @endif>
        </div>

        <div>
            <label for="">email</label>
            <input type="text" name="email" value="{{old('email')}}">
        </div>

        <div>
            <input type="submit" value="register">
        </div>
    </form>
</body>
</html>
