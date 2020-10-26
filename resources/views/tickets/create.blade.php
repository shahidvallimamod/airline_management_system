<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('tickets.store')}}" method="post">
        @csrf
        <div>
            <div>
                @error('from_airport')
                    <div>{{ $message }}</div>
                @enderror
                <label for="name">فرودگاه مبدا</label>
                <select name="from_airport">
                    <option value="">انتخاب کنید...</option>
                    @foreach($data['airports'] as $airport)
                        <option value="{{$airport->id}}">{{$airport->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="name">فرودگاه مقصد</label>
                <select name="to_airport">
                    <option value="">انتخاب کنید...</option>
                    @foreach($data['airports'] as $airport)
                        <option value="{{$airport->id}}">{{$airport->name}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="name">نوع هواپیما</label>
                <input type="text" name="airplane_model">
            </div>

            <div>
                <label for="name">شماره پرواز</label>
                <input type="text" name="flight_number">
            </div>

            <div>
                <label for="name">تعداد صندلی های مجاز</label>
                <input type="text" name="available_seat">
            </div>

        </div>
        <div>
            <input type="submit" value="ذخیره">
        </div>
    </form>
</body>
</html>
