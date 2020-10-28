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
    <h1>airlines</h1>
    <a href="{{route('airlines.create')}}">افزودن ایرلاین</a>
    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>نام</th>
                <th>نشان</th>
                <th>علمیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $airline)
                <tr>
                    <td>{{$airline->id}}</td>
                    <td>{{$airline->name}}</td>
                    <td><img src="{{asset('storage/'.$airline->logo)}}" alt=""></td>
                    <td><a href="{{route('airlines.edit', $airline->id)}}">ویرایش</a></td>
                    <td><a href="{{route('airlines.show', $airline->id)}}">نمایش</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
