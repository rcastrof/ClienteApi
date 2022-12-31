<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>create</h1>
    <form action="{{ route('uf.store') }}" method="POST">
        @csrf
        <label for="Nombre">Nombre Indicador</label>
        <input type="text" name="nombreIndicador"> <br>

        <label for="codigoIndicador">Codigo Indicador</label>
        <input type="text" name="codigoIndicador"> <br>

        <label for="unidadMedidaIndicador">Unidad Medida Indicador</label>
        <input type="text" name="unidadMedidaIndicador"> <br>

        <label for="valorIndicador">Valor Indicador</Var></label>
        <input type="number" name="valorIndicador"> <br>

        <label for="fechaIndicador">Fecha Indicador</label>
        <input type="text" name="fechaIndicador"> <br>
        <input type="submit">
        <br>
        <br>
    </form>
    <button><a href="{{ url()->previous() }}">Volver</a></button>
</body>

</html>
