<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title class="title">Изменить контакт</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/reset.css">
</head>

<body style="background: bisque">
    <label>Изменить контакт</label>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('contact-update', $contact->id) }}"
    >
        @csrf

        <div style="display: inline-block; padding: 20px">
            <label for="name">Фото</label>
            <input type='file' id="photo" name="photo"/><br>
            <label for="name">ФИО</label>
            <input type="text" id="name" name="name" value="{{$contact->name}}"/><br>
            <label for="company">Компания</label>
            <input type="text" id="company" name="company" value="{{$contact->company}}"/><br>
            <label for="phone">Телефон</label>
            <input type="text" id="phone" name="phone" value="{{$contact->phone}}"/><br>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{$contact->email}}"/><br>
            <label for="birthdate">Дата рождения</label>
            <input type="text" id="birthdate" name="birthdate" value="{{$contact->birthdate}}"/><br>
            <button type="submit" id="update_contact" name="update_contact">Готово</button>
        </div>

    </form>

</body>

<style>
    input
    {
        margin: 5px;
    }
</style>
