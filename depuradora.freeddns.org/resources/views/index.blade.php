@extends('layouts.master')

@section('titulopagina', 'Índice')

@section('contido')

<div class="d-flex justify-content-center">
  <div id="carouselExampleIndicators" class="carousel slide d-none d-md-block" data-ride="carousel" style="max-height: 600px; max-width: 800px;" style="background-color: var(--bg-color)">
    <ol class="carousel-indicators" style="background-color: var(--bg-color)">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{ asset('img/carrusel/foto1.jpg') }}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('img/carrusel/foto2.jpg') }}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{ asset('img/carrusel/foto3.jpg') }}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


{{-- Enlaces a produtos --}}
<div class="d-flex justify-content-center flex-wrap">
  @php($mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get())
  @foreach ($mariscos as $marisco)
    <div class="card d-block d-md-inline-block" style="width: 18rem; margin: 25px;">
      {{-- Asociar cada tipo de marisco no seeder a unha imaxe da carpeta imaxes e despois poñer aqui a dirección --}}
      <a href="{{ route('mariscos.show', $marisco->id) }}"><img class="card-img-top" src={{ asset("img/mariscos/$marisco->fotografia.jpg") }}></a>
      <div class="card-body">
        <h4><a href="{{ route('mariscos.show', $marisco->id) }}">{{ $marisco->tipo }}</a></h4>
      </div>
   </div>
  @endforeach
</div>

@endsection