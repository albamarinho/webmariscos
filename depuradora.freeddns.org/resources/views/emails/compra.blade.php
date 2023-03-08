<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <strong><h1>Compra realizada</h1></strong>
    <p><strong>Cliente:</strong> {{ $name }} {{ $surname }}<br>
        <strong>Dirección:</strong> {{ $enderezo }}<br>
        <strong>DNI:</strong> {{ $dni }}<br>
        <strong>Email:</strong> {{ $email }}<br>
        <strong>Produtos:</strong><br>
        
        @php($totalCost = 0);
        @foreach ($produtos as $produto)
            @foreach ($mariscos as $marisco)
                @if ($produto->tipo_marisco == $marisco->id)
                    Marisco: {{ $marisco->tipo }}<br>
                @endif
            @endforeach
            Cantidade: {{ $produto->cantidade }} kg<br>
            Prezo: {{ $produto->prezo }} €<br>
            @php($totalCost += $produto->prezo);
        @endforeach

        <strong>Custo total:</strong> {{ $totalCost }}<br>
        
        @if ($tipo_compra == 'envio')
        Envío a domicilio.
        @else
        Recollida en tenda.
        @endif
    </p>
</body>
</html>