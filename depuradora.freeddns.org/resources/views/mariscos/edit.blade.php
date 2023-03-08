{{-- Solo pode entrar un administrador (rol 1) --}}

@extends('layouts.master')

@section('titulopagina', $marisco->tipo)

@section('contido')
<form action="{{ route('mariscos.update', $marisco->id) }}" method="post">
    @method('put')
    @csrf

    <h1>{{ $marisco->tipo }}</h1>

    <div class="form-group">
        <label>Cantidade:</label>
        <input type="number" name="cantidade" min="0" value="{{ old('cantidade', $marisco->cantidade) }}">
        @error('cantidade')
            <small class="alert alert-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group">
        <label>Custo unitario:</label>
        <input type="number" name="custo_unitario" min="0" value="{{ old('custo_unitario', $marisco->custo_unitario) }}">
        @error('custo_unitario')
            <small class="alert alert-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group" hidden>
        <label>Tipo:</label>
        <input type="text" name="tipo" value="{{ old('tipo', $marisco->tipo) }}">
    </div>
    
    <div class="form-group" hidden>
        <label>Fotografia:</label>
        <input type="text" name="fotografia" value="{{ old('fotografia', $marisco->fotografia) }}">
    </div>

    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Volver</a>
    <button type="submit" class="btn btn-primary">Confirmar edición</button>
</form>

@endsection