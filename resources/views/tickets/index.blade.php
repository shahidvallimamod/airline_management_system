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
    <h1>tickets</h1>
    <a href="{{route('tickets.create')}}">افزودن پرواز</a>
    <table>
        <thead>
            <tr>
                <th>شناسه</th>
                <th>ایرلاین</th>
                <th>از</th>
                <th>به</th>
                <th>هواپیما</th>
                <th>شماره پرواز</th>
                <th>تعداد صندلی</th>
                <th>تاریخ پرواز</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['tickets'] as $ticket)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->airline->name}}</td>
                    <td>{{$ticket->fromAirport->name}}</td>
                    <td>{{$ticket->toAirport->name}}</td>
                    <td>{{$ticket->airplane_model}}</td>
                    <td>{{$ticket->flight_number}}</td>
                    <td>{{$ticket->available_seat}}</td>
                    <td>{{jdate($ticket->created_at)}}</td>
                    <td><a href="{{route('tickets.edit', $ticket->id)}}">ویرایش</a></td>
                    <td><a href="{{route('tickets.show', $ticket->id)}}">نمایش</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$data['tickets']->links()}}
</body>
</html>
