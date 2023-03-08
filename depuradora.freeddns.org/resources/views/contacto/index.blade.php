@extends('layouts.master')

@section('titulopagina', 'Contacto')

@section('contido')
    <h1>Quen somos</h1>
    <p>Somos <strong>DEPURADORA MARIÑO S.L.</strong>, unha empresa adicada á compra, depuración e venda de mariscos da ría de Arousa. Para calquera información pode deixar unha mensaxe ou escribir directamente ao enderezo de correo indicado.<br><br>

        Se vostede é un <strong>maiorista</strong>, contacte con nós para ofrecerlle un prezo especial.<br><br>

        Imaxes cortesía da <strong>Cofradía de Mariscadores de Cabo de Cruz</strong>.
    </p>
    <hr>
    <h1>A nosa información de contacto</h1>
    <p>Pode contactar conosco a través do seguinte enderezo electrónico:<br>
        Correo:
    @php($admins = DB::table('users')->select('*')->where('rol_id', '1')->get())
    @foreach ($admins as $admin)
        {{ $admin->email }}</p>
    @endforeach
    <h2>Déixanos unha mensaxe</h2>
    <form action="{{ route("contacto.store") }}" method="POST">
        @csrf
        <label>Nome:
            <input class="form-control" type="text" name="name">
        </label>
        <br>
        @error('name')
            <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
        <label>Correo:
            <input class="form-control" type="text" name="correo">
        </label>
        <br>
        @error('correo')
                <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
        <label>Mensaxe:
            <textarea class="form-control" name="mensaxe" rows="4"></textarea>
        </label>
        <br>
        @error('mensaxe')
                <div class="alert alert-danger"><strong>{{ $message }}</strong></div>
        @enderror
        <button class="btn btn-primary" type="submit">Enviar mensaxe</button>
    </form>
    
@endsection