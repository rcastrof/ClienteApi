<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

</body>
</html>
