<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap CSS -->

    <title>Document</title>
</head>

<body>
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
</body>
<button><a href="{{ url()->previous() }}">Volver</a></button>
<button><a href="{{ route('uf.create') }}">Crear</a></button>

</html>
