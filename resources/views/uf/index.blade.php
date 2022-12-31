<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
<h1>uf</h1>
<table class="table">
    <thead class="">
        <tr>
            <th>Nombre indicador</th>
            <th>Codigo Indicador</th>
            <th>Unidad de Medida Indicador</th>
            <th>Valor Indicador</th>
            <th>Fecha Indicador</th>
        </tr>
    </thead>
    <tbody>

        @foreach($ufs as $uf)
        <tr>


            <td><a href="{{ route('uf.show', [$uf]) }}">{{$uf->nombreIndicador}}   </a></td>
            <td>{{$uf->codigoIndicador}}</td>
            <td>{{$uf->unidadMedidaIndicador}}</td>
            <td>{{$uf->valorIndicador}}</td>
            <td>{{$uf->fechaIndicador}}</td>

            <td>
                <a href="{{route('uf.edit',[$uf])}}" class="btn btn-waringin btn-sm mr-2"> Editar </a>
                <form action="{{route('uf.destroy',[$uf])}}" method="POST">
                @csrf
                @method("DELETE")
                <button  onclick="return confirm('Estas seguro?')" class="btn btn-danger btn-sm"> Borrar </button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$ufs->onEachSide(1)->links()}}
</body>
<button><a href="{{url()->previous()}}">Volver</a></button>
<button><a href="{{route('uf.create')}}">Crear</a></button>


<style>
    ul.pagination li {
    display: inline;
}
</style>

</html>
