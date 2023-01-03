<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

{{-- bootstrap --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
{{-- jquerycore --}}
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
{{-- jqueryui --}}
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>


    <title>Valor uf</title>
</head>
<body>
    <h1> uf</h1>
    <div class="card-body">
        <div class="input-daterange datepicker row align-items-center" data-date-format="yyyy-mm-dd">
            <div class="col">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control" placeholder="Fecha Inicio" type="text" value="{{$start}}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control" placeholder="Fecha Fin" type="text" value="{{$end}}">
                    </div>
                </div>
            </div>
        </div>
        <div id="container">
        </div>
    </div>

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
</body>

{{-- highcharts --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
{{-- datepicker --}}
<script src="{{asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>




<script>
Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Valor UF'
    },

    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        title: {
            text: 'Valor uf'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Valores',
        data: @json($counts)
    }]
});
</script>


