<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session('success'))
        {{session('success')}}
    @endif
    <h1>airports</h1>
    <a href="{{route('tickets.create')}}">افزودن ایرلاین</a>
    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>علمیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $airport)
                <tr>
                    <td>{{$airport->id}}</td>
                    <td>{{$airport->name}}</td>
                    <td><a href="{{route('airports.edit', $airport->id)}}">ویرایش</a></td>
                    <td><a href="{{route('airports.show', $airport->id)}}">نمایش</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
