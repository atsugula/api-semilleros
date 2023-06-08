<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email register users</title>
    <style>

    </style>
</head>
<body>
    <h1>Bienvenido {{ $user['name'] }} {{ $user['lastname'] }}</h1>
    <p>Sus datos de acceso a la plataforma son: </p>
    <p><b>su correo electronico:</b> {{ $user['email'] }}</p>
    <p><b>su contraseña:</b> "Su numero de documento."</p>
    <p><small>”Si recibio el correo por favor haga <a href="#">click aqui</a>”</small></p>
</body>
</html>