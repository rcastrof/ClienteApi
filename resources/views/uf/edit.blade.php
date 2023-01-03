@extends('layouts.app')
@section('content')
edit
<form action="{{ route('uf.update',[$uf])}}" method="POST">
    @csrf
    @method("PUT")

    <label for="Nombre" >Nombre Indicador</label>
    <input type="text" value="{{$uf->nombreIndicador}}" name="nombreIndicador"> <br>

    <label for="codigoIndicador">Codigo Indicador</label>
    <input type="text" value="{{$uf->codigoIndicador}}" name="codigoIndicador"> <br>

    <label for="unidadMedidaIndicador">Unidad Medida Indicador</label>
    <input type="text" value="{{$uf->unidadMedidaIndicador}}" name="unidadMedidaIndicador"> <br>

    <label for="valorIndicador">Valor Indicador</Var></label>
    <input type="number" value="{{$uf->valorIndicador}}" name="valorIndicador"> <br>

    <label for="fechaIndicador">Fecha Indicador</label>
    <input type="text" value="{{$uf->fechaIndicador}}" name="fechaIndicador"> <br>
    <input type="submit">
    <br>
    <br>
</form>
<button><a href="{{ url()->previous() }}">Volver</a></button>
@endsection
