@extends('layouts.app')
@section('content')
    <h1>uf</h1>
    <div class="card-body">
        <table class="table table-striped table-bordered" id="order_table">
            <thead class="">
                <tr>
                    <th>Nombre</th>
                    <th>Codigo</th>
                    <th>Unidad de Medida </th>
                    <th>Valor</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($ufs as $uf)
                    <tr>


                        <td><a href="{{ route('uf.show', [$uf]) }}">{{ $uf->nombreIndicador }} </a></td>
                        <td>{{ $uf->codigoIndicador }}</td>
                        <td>{{ $uf->unidadMedidaIndicador }}</td>
                        <td>{{ $uf->valorIndicador }}</td>
                        <td>{{ $uf->fechaIndicador }}</td>

                        <td>
                            <a href="{{ route('uf.edit', [$uf]) }}" class="btn btn-warning btn-sm mr-2"> Editar </a>
                            <form action="{{ route('uf.destroy', [$uf]) }}" method="POST">
                                <br>
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Estas seguro?')" class="btn btn-danger btn-sm"> Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $ufs->onEachSide(1)->links() }}
<button><a href="{{ url()->previous() }}">Volver</a></button>
<button><a href="{{ route('uf.create') }}">Crear</a></button>
@endsection
