<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('signin')}}" method="post">
        @csrf
        <label for="mobile">mobile</label>
        <input type="text" name="mobile">

        <label for="password">password</label>
        <input type="password" name="password">

        <input type="submit" value="login">
    </form>
</body>
</html>
