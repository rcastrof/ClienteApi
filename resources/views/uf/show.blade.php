@extends('layouts.app')
@section('content')
show
<br>
<label >Nombre: </label>
<td>{{$uf->nombreIndicador}}</td>
<br>
<td>{{$uf->codigoIndicador}}</td>
<br>
<td>{{$uf->unidadMedidaIndicador}}</td>
<br>
<td>{{$uf->valorIndicador}}</td>
<br>
<td>{{$uf->fechaIndicador}}</td>
<br>
<button><a href="{{ url()->previous() }}">Volver</a></button>
@endsection
