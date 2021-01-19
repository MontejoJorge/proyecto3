<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="{{ route("requestor.create") }}">Registrar</a></li>
        <li><a href="{{ route("login.show") }}">Login</a></li>
        <li><a href="#" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">
                        LogOut</a></li>
    </ul>


    <form id="logout-form" action="{{ route("logout") }}" method="POST" class="d-none">
        @csrf
    </form>
</body>
</html>