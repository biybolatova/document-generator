<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ ('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Генерация договора</title>
</head>
<body>
    <section class="section">
        <h1 class="section__title"> Генерация договора</h1>
        <form method="POST" action="{{ route('save') }}" class="section__form">
            @csrf
            <input type="text" name="num_contract" class="section__form-input" placeholder="Номер договора">
            <input type="text" name="name_company" class="section__form-input" placeholder="Название компании">
            <input type="text" name="requisites_company" class="section__form-input" placeholder="Реквизиты компании">
            <input type="text" name="name_counterparty" class="section__form-input" placeholder="Название контрагента">
            <input type="text" name="requisites_counterparty" class="section__form-input" placeholder="Реквизиты контрагента">
            <input type="submit" class="btn" value="Сгенерировать договор">
        </form>
    </section>
</body>
</html>
