@extends('layouts.master')

@section('titulopagina', $marisco->tipo)

@section('contido')

<div id="container-master">
    <div id="container-img">
        <img src=@if($marisco->fotografia != "null")
            {{ asset("img/mariscos/$marisco->fotografia.jpg") }}
        @endif style="width:100%; max-width:400px;" alt="Fotografía dunha caixa de {{ $marisco->tipo }}" class="mx-auto d-block">
    </div>

    <hr class="d-block d-md-none"/>
    
    <div id="container-text">
        <h1>{{ $marisco->tipo }}</h1>
        <p><strong>Cantidade:</strong> {{ $marisco->cantidade }} kg<br>
        <strong>Custo unitario:</strong> {{ $marisco->custo_unitario }} €/kg<br></p>
        @auth
            @if (auth()->user()->rol->key == 'regular')
                <form method="post" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="cantidade">Elixe unha cantidade (en kilos) a engadir:</label>
                        <input type="number" name="cantidade" min="1" max="{{ $marisco->cantidade }}">
                    </div>
                    @error('cantidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form-group" hidden>
                        <label for="tipo_marisco">Tipo marisco:</label>
                        <input type="number" name="tipo_marisco" value="{{ $marisco->id }}">
                    </div>
                    @error('tipo_marisco')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form-group" hidden>
                        <label for="user_id">Usuario:</label>
                        <input type="number" name="user_id" value="{{ Auth::user()->id }}">
                    </div>
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="form-group" hidden>
                        <label for="prezo">Prezo:</label>
                        <input type="number" name="prezo" value="{{ $marisco->custo_unitario }}">
                    </div>
                    @error('prezo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                    <button type="submit" class="btn btn-primary">Engadir produto</button>                    
                @endif

                @if (auth()->user()->rol->key == 'admin')
                    <a href="{{ route('mariscos.edit', $marisco->id) }}" class="btn btn-success">Editar</a>
                @endif
            </form>
        @endauth
    </div>
</div>
@endsection