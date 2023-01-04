@extends('layouts.app')
@section('content')
        <div class="container app">
            <div class="card-body">
                <div>
                    <h4>Editar</h4>
                </div>
                <form action="{{ route('uf.update', [$uf]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <strong>{{ __('Nombre:') }}</strong>
                        <input type="text" value="{{ $uf->nombreIndicador }}" class="form-control" aria-label="Nombre"
                            aria-describedby="inputGroup-sizing-default" name="nombreIndicador">
                    </div>

                    <div>
                        <strong>{{ __('Codigo:') }}</strong>
                        <input type="text" value="{{ $uf->codigoIndicador }}" class="form-control"
                            aria-label="codigoIndicador" aria-describedby="inputGroup-sizing-default"
                            name="codigoIndicador">
                    </div>

                    <div>
                        <strong>{{ __('Medida:') }}</strong>
                        <input type="text" value="{{ $uf->unidadMedidaIndicador }}" class="form-control"
                            aria-label="unidadMedidaIndicador" aria-describedby="inputGroup-sizing-default"
                            name="unidadMedidaIndicador">
                    </div>

                    <div>
                        <strong>{{ __('Valor:') }}</strong>
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                            <input type="text" value="{{ $uf->valorIndicador }}" class="form-control validanumericos"
                                name="valorIndicador" aria-label="Dollar amount (with dot and two decimal places)">
                        </div>

                    </div>

                    <div>
                        <strong>{{ __('Fecha:') }}</strong>
                        <input type="text" value="{{ $uf->fechaIndicador }}" class="form-control"
                            aria-label="fechaIndicador" aria-describedby="inputGroup-sizing-default"
                            placeholder="2022-12-31" name="fechaIndicador">
                    </div>
                    <br>
                    <div>
                        <input class="btn btn-primary btn-sm mr-2"type="submit">
                        <a class="btn btn-info btn-sm mr-2" href="{{ url()->previous() }}">Volver</a>

                    </div>
                </form>
                <br>
            </div>
        </div>
@endsection
