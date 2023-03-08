<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h1>Mensaxe recibida</h1>
    <p>Chegou a seguinte mensaxe:</p>
    {{-- Recibe os valores do Mailable --}}
    <p><strong>Nome:</strong> {{ $contacto['name'] }}</p>
    <p><strong>Correo:</strong> {{ $contacto['correo'] }}</p>
    <p><strong>Mensaxe:</strong> {{ $contacto['mensaxe'] }}</p>

</body>
</html>