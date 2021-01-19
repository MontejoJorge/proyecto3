<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("requestor.store") }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="email"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="password" name="password" placeholder="Repeat the password"><br>
        <input type="number" name="phone" placeholder="phone"><br>
        <input type="text" name="name" placeholder="name"><br>
        <input type="text" name="surname" placeholder="surname"><br>
        <input type="text" name="dni" placeholder="dni"><br>
        <input type="date" name="birthdate" placeholder="birthdate"><br>
        <input type="text" name="place_of_birth" placeholder="place_of_birth"><br>
        <input type="text" name="postal_code" placeholder="postal_code"><br>
        <input type="text" name="street_name" placeholder="street_name"><br>
        <input type="number" name="number" placeholder="number"><br>
        <input type="text" name="floor" placeholder="floor"><br>
        <input type="text" name="door" placeholder="door"><br>
        <input type="text" name="city" placeholder="city"><br>
        
        <button>Enviar</button>
    </form>
</body>
</html>