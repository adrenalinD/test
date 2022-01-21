<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Заказ № {{ $order->id }}</title>
</head>
<body>

<h1 class="text-center">Заказ № {{ $order->id }}</h1>
<div class="row justify-content-center">
    <div class="col-md-6 ">
        <p>Клиент: {{ $order->client->name }}</p>
        <p>Телефон клиента: {{ $order->client->phone }}</p>
        <p>Дата создания заказа: {{ $order->create_date }}</p>
        <p>Название рациона питания: {{ $order->ration_name }}</p>
        <p>Период доставки: {{ $order->start_date }} - {{ $order->end_date }}</p>
        <p>Расписание доставки: {{ \App\Models\Order::DELIVERY[$order->delivery_type] }}</p>
        <p>Дни недели питания
            @foreach(json_decode($order->days) as $day)
                {{\App\Models\Order::WEEKDAYS[$day]}},
            @endforeach
        </p>
        <p>Комментарий: {{ $order->comment }}</p>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Дата</th>
                <th scope="col">Порции</th>
            </tr>
            </thead>
            <tbody>

            @foreach($order->getSchedule() as $key => $schedule)
                <tr>
                    <th scope="row">{{ $schedule['date'] }}</th>
                    <td>{{ $schedule['portions'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
