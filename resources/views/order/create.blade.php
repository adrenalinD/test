<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Создание заказа</title>
</head>
<body>

<h1 class="text-center">Создание заказа</h1>
<div class="row justify-content-center">
    <div class="col-md-6 ">
        <form method="POST">
            @csrf
            <div class="mb-3">
                <label for="fio" class="form-label">ФИО *</label>
                <input type="text" class="form-control" name="fio" id="fio" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Телефон *</label>
                <input type="text" class="form-control" name="phone" id="phone" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Дата создания *</label>
                <input type="date" class="form-control" name="create_date" value="{{ now()->format('Y-m-d') }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Название рациона питания *</label>
                <input type="text" class="form-control" name="ration_name" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Период доставки *</label>
                <div class="input-group">
                    <input type="date" class="form-control" name="start_date" required>
                    <input type="date" class="form-control" name="end_date" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Расписание доставки *</label>
                <select class="form-control" name="delivery_type" required>
                    @foreach(\App\Models\Order::DELIVERY as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Дни недели питания *</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="days[]" id="6" value="6">
                    <label class="form-check-label" for="6">Пн</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="days[]" id="1" value="1">
                    <label class="form-check-label" for="1">Вт</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="days[]" id="2" value="2">
                    <label class="form-check-label" for="2">Ср</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="days[]" id="3" value="3">
                    <label class="form-check-label" for="3">Чт</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="days[]" id="4" value="4">
                    <label class="form-check-label" for="4">Пт</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="days[]" id="5" value="5">
                    <label class="form-check-label" for="5">Сб</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="0" name="days[]" value="0">
                    <label class="form-check-label" for="0">Вск</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <a class="btn btn-dark" href="{{ route('order.list') }}" type="submit">Назад</a>
            <button class="btn btn-success text-center" type="submit">Создать</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
