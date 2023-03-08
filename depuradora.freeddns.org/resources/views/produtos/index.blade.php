@extends('layouts.master')

@section('titulopagina', 'Perfil')

@section('contido')
    <div id="container-profile">
        <div id="container-1">
            <h1>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h1>
            <p><strong>DNI:</strong> {{ Auth::user()->dni }}<br>
                <strong>Enderezo:</strong> {{ Auth::user()->enderezo }}<br>
                <strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>
        
        <hr>
    
        <div id="container-2">
            @if (auth()->user()->rol->key == 'admin')
                <h2>Usuarios</h2>
                <table style="width:100%">
                    <tr>
                    <th>Nome</th>
                    <th>Apelidos</th>
                    <th>DNI</th>
                    <th>Enderezo</th>
                    <th>Email</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->dni }}</td>
                        <td>{{ $user->enderezo }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </table>

                <hr>

                <h2>Mariscos</h2>
                <div class="d-flex flex-wrap">
                @foreach ($mariscos as $marisco)
                <div style="margin:25px;">
                    <h2><a href="{{ route('mariscos.show', $marisco->id) }}">{{ $marisco->tipo }}</a></h2>
                    <p><strong>Cantidade:</strong> {{ $marisco->cantidade }} kg<br>
                        <strong>Custo unitario:</strong> {{ $marisco->custo_unitario }} €/kg<br></p>
                    <a href="{{ route('mariscos.edit', $marisco->id) }}" class="btn btn-success">Editar</a>
                </div>
                    
                @endforeach
                </div>

            @endif

            @if(auth()->user()->rol->key == 'regular')
                <h2>Produtos</h2>
                <table style="width:100%">
                    <tr>
                        <th>Tipo de marisco</th>
                        <th>Cantidade (kg)</th>
                        <th>Prezo (€)</th>
                    </tr>
                    @php($totalCost = 0)
                    @php($numberProducts = 0)
                    @foreach ($produtos as $produto)
                        @php($numberProducts+=1)
                        <tr>
                            <td>
                                @foreach ($mariscos as $marisco)
                                    @if ($marisco->id == $produto->tipo_marisco)
                                        {{ $marisco->tipo }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $produto->cantidade }}</td>
                            <td>{{ $produto->prezo }}</td>
                            @php($totalCost += $produto->prezo)
                            <td hidden class="idProduto">{{ $produto->id }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>Prezo total:</th>
                        <td></td>
                        <td>
                            @if (Auth::user()->tipo_compra == 'envio')
                                {{ $totalCost+=5 }}
                            @else
                                {{ $totalCost }}
                            @endif
                        </td>
                    </tr>
                </table>
        
                <br>
        
                <p>Seleccione un método de compra:</p>
                <form action="{{ route('user.update', Auth::user()->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <input type="radio" id="envio" name="tipo_compra" value="envio" {{ Auth::user()->tipo_compra == 'envio' ? 'checked' : '' }}>
                        <label for="envio" class="col-form-label">Envío a casa (+5€ de envío)</label><br/>
                        <input type="radio" id="tenda" name="tipo_compra" value="tenda" {{ Auth::user()->tipo_compra == 'tenda' ? 'checked' : '' }}>
                        <label for="tenda" class="col-form-label">Recollida en tenda</label>
                    </div>
            
                    <div class="form-group" hidden>
                        <input type="number" name="id" value="{{ Auth::user()->id }}">
                    </div>
                    
                    <button class="btn btn-primary" type="submit">Elixir</button>
                </form>

                @if ($numberProducts > 0)
                    <br>
                    <button class="btn btn-success" data-toggle="modal" data-target="#finalizarCompra">Realizar compra</button>
                @endif
        
            @endif
    
        </div>
    
        <hr>
    
        <div id="container-3">
            <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#logoutModal">Pechar sesión</button>
                <br class="d-none d-md-block">
                <br class="d-none d-md-block">
                <button class="btn btn-danger" data-toggle="modal" data-target="#borrarConta">Eliminar conta</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="finalizarCompra" tabindex="-1" role="dialog" aria-labelledby="finalizarCompraLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="finalizarCompraLabel">Desexa finalizar a súa compra?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="formularioCompra" method="POST" action="{{ route('produtos.deleteProducts') }}" data-action="{{ route('produtos.deleteProducts') }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-primary" id="compraButton">Finalizar compra</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="borrarConta" tabindex="-1" role="dialog" aria-labelledby="borrarContaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borrarContaLabel">Seguro que desexa borrar a súa conta?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Estes cambios non se poden desfacer</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form id="formularioConta" method="POST" action="{{ route('user.borrarUsuario') }}" data-action="{{ route('user.borrarUsuario') }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-primary" id="contaButton">Eliminar conta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
