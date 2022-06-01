<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ ('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Сгенерированный договоры</title>
</head>
<body>
    <section class="section">
        <h1 class="section__title">Сгенерированные договоры</h1>
        <table>
            @foreach($data as $dataItem)
                <tr>
                    <td>{{$dataItem->id}}</td>
                    <td>Договор №{{$dataItem->num_contract}}</td>
                    <td><a href="{{ route('download', ['id' => $dataItem->id])}}">Скачать файл</a></td>
                </tr>
            @endforeach
        </table>
   </section>
</body>
</html>
