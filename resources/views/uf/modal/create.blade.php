<form action="" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-tittle">{{ __('Crear nuevo registro') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('uf.store') }}" method="POST">
                        @csrf
                        <div>
                            <strong>{{ __('Nombre:') }}</strong>
                            <input type="text" class="form-control" aria-label="Nombre"
                                aria-describedby="inputGroup-sizing-default" name="nombreIndicador">
                        </div>

                        <div>
                            <strong>{{ __('Codigo:') }}</strong>
                            <input type="text" class="form-control" aria-label="codigoIndicador"
                                aria-describedby="inputGroup-sizing-default" name="codigoIndicador">
                        </div>

                        <div>
                            <strong>{{ __('Medida:') }}</strong>
                            <input type="text" class="form-control" aria-label="unidadMedidaIndicador"
                                aria-describedby="inputGroup-sizing-default" name="unidadMedidaIndicador">
                        </div>

                        <div>
                            <strong>{{ __('Valor:') }}</strong>
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control validanumericos" name="valorIndicador"
                                    aria-label="Dollar amount (with dot and two decimal places)">
                            </div>

                        </div>

                        <div>
                            <strong>{{ __('Fecha:') }}</strong>
                            <input type="text" class="form-control" aria-label="fechaIndicador"
                                aria-describedby="inputGroup-sizing-default" placeholder="2022-12-31"
                                name="fechaIndicador">
                        </div>
                        <br>
                        <div>
                            <input class="btn btn-primary btn-sm mr-2"type="submit">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</form>
