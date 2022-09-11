<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title class="title">Контакты</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/reset.css">
</head>

<body style="background: bisque">

    <label>Добавить контакт</label>

    <form method="POST" enctype="multipart/form-data"
          action="{{ route('contact-add') }}"
    >
        @csrf

        <div style="display: inline-block; height: 250px; padding: 20px">
            <label for="photo">Фото</label>
            <input type='file' id="photo" name="photo"/><br>
            <label for="name">ФИО</label>
            <input type="text" id="name" name="name"/><br>
            @error('name')
            <div>{{$message}}</div>
            @enderror
            <label for="company">Компания</label>
            <input type="text" id="company" name="company"/><br>
            <label for="phone">Телефон</label>
            <input type="text" id="phone" name="phone"/><br>
            @error('phone')
            <div>{{$message}}</div>
            @enderror
            <label for="email">Email</label>
            <input type="text" id="email" name="email"/><br>
            @error('email')
            <div>{{$message}}</div>
            @enderror
            <label for="birthdate">Дата рождения</label>
            <input type="text" id="birthdate" name="birthdate"/><br>
            <button type="submit" id="add_contact" name="add_contact">Готово</button>
        </div>

    </form>

    <label class="page-title">Контакты</label><br>

    <table>
        <tr>
            <th>ФИО</th>
            <th>Компания</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Дата рождения</th>
            <th>Фото</th>
            <th>Действие</th>
        </tr>

        @foreach($contacts as $contact)
            <tr>
                <td><a href="{{route('contact',$contact->id)}}">{{$contact->name}}</a></td>
                <td><a href="{{route('contact',$contact->id)}}">{{$contact->company}}</a></td>
                <td><a href="{{route('contact',$contact->id)}}">{{$contact->phone}}</a></td>
                <td><a href="{{route('contact',$contact->id)}}">{{$contact->email}}</a></td>
                <td><a href="{{route('contact',$contact->id)}}">{{$contact->birthdate}}</a></td>
                <td><a href="{{route('contact',$contact->id)}}"><img src="{{Storage::url($contact->photo)}}" height="100" alt=""/></a></td>
                <td>
                    <form action="{{route('contact-remove', $contact->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type='submit' value="Удалить"/>
                    </form>
                    <a href="{{ route('contact-edit',  $contact) }}">Изменить</a>
                </td>
            </tr>
        @endforeach
    </table>

</body>

<style>
    table tr th, td
    {
        border: 1px solid #000000;
        width: 200px;
        text-align: center;
        background: #ffffff;
    }
    input
    {
        margin: 5px;
    }
</style>
