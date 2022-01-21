<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Заказы</title>
</head>
<body>

<h1 class="text-center">Заказы</h1>

<div class="row justify-content-center">
    <a href="{{ route('order.create') }}">Создать заказ</a>
    <div class="col-md-6 ">
        @if($orders->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">ФИО клиента</th>
                <th scope="col">Телефон</th>
                <th scope="col">название рациона питания</th>
                <th scope="col">период доставки</th>
                <th scope="col">расписание доставки</th>
                <th scope="col">дни недели питания</th>
                <th scope="col">комментарий</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            <tr>
                <th scope="row"><a href="{{route('order.show', ['id' => $order->id])}}">{{ $order->id }}</a></th>
                <td>{{ $order->client->name }}</td>
                <td>{{ $order->client->phone }}</td>
                <td>{{ $order->ration_name }}</td>
                <td>{{ $order->start_date }} - {{ $order->end_date }}</td>
                <td>{{ \App\Models\Order::DELIVERY[$order->delivery_type] }}</td>
                <td>
                    @foreach(json_decode($order->days) as $day)
                        {{\App\Models\Order::WEEKDAYS[$day]}},
                    @endforeach
                </td>
                <td>{{ $order->comment }}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
