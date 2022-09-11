<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title class="title">{{$contact->name}}</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/reset.css">
</head>

<body style="background: bisque">
    <div style="display: inline-block; padding: 20px">
        <img src="{{Storage::url($contact->photo)}}" height="200" alt=""/>
        <input type='file' id="photo" name="photo"/><br>
        <label>ФИО</label>
        <label>{{$contact->name}}</label><br>
        <label>Компания</label>
        <label>{{$contact->company}}</label><br>
        <label>Телефон</label>
        <label>{{$contact->phone}}</label><br>
        <label>Email</label>
        <label>{{$contact->email}}</label><br>
        <label>Дата рождения</label>
        <label>{{$contact->birthdate}}</label><br>
    </div>

</form>

</body>
