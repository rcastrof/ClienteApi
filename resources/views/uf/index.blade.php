@extends('layouts.app')
@section('content')
        <div class="container app">
            <div class="card-body">
                <h4>Valor uf</h4>
                <p>
                    Notas: <Br>
                    - Filtro sin funcionamiento. <br>
                    - Click en nombres para SHOW
                </p>

                <div class="input-daterange datepicker row align-items-center" data-date-format="yyyy-mm-dd">
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control" placeholder="Fecha Inicio" type="text"
                                    value="{{ $start }}" id="startDate">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control" placeholder="Fecha Fin" type="text"
                                    value="{{ $end }}" id="endDate">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="container">
                </div>
            </div>

            <div class="tabla">
                <a class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#ModalCreate"
                    href="#">Crear</a>
                <br>
                <br>
                <table class="table table-dark table-striped table-bordered tablas w-auto" id="order_table">
                    <thead class="">
                        <tr>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Unidad de Medida </th>
                            <th>Valor</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
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
                                    <div>
                                        <a href="{{ route('uf.edit', [$uf]) }}" class="btn btn-warning btn-sm mr-2">
                                            Editar
                                        </a>

                                        <form action="{{ route('uf.destroy', [$uf]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Estas seguro?')"
                                                class="btn btn-danger btn-sm">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $ufs->onEachSide(1)->links() }}
            </div>
        </div>
@include('uf.modal.create')
{{-- core --}}
<script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
{{-- highcharts --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
{{-- datepicker --}}
<script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
{{-- validar numericos --}}
<script src="{{ 'js/chart/uf.js' }}"></script>


<script src="{{ asset('js/argon-dashboard.min.js?v=1.1.2') }}"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script>
    $(function() {
        $start = $('#startDate');
        $end = $('#endDate');
    });

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
@endsection

