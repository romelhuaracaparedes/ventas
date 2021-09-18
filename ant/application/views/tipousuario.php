<div class="container-fluid">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Tipo de usuario</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <button class="btn ripple btn-primary" id="agregar-tipo-usuario">
                        <i class="fe fe-plus mr-2"></i> Agregar nuevo
                    </button>


                    </button>
                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            
                            <table class="table" id="tablatipousuarios">
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->


    </div>
</div>
<!-- usuario Modal -->
<div class="modal" id="modal-tipo-usuario">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="titulo_modal"></h6>
                <button aria-label="Close" class="close btn-cancelar"  type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="row py-2">
                        <input type="hidden" id="id_tipo_usuario">
                        <div class="col-md-6">
                            <label for="tipo_usuario">Tipo de usuario</label>
                            <input type="text" class="form-control" id="tipo_usuario" placeholder="Escribir el tipo de usario">
                        </div>
                        <div class="col-md-6 pt-md-0 pt-3">
                            <p class="mb-2">Estado</p>
                            <label class="custom-switch">
                                <input type="checkbox" name="estado_tipo_usuario" id="estado_tipo_usuario" class="custom-switch-input" checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Activo</span>
                            </label>

                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">

                <button class="btn ripple btn-secondary btn-cancelar" type="button" >Cancelar</button>
                <button class="btn ripple btn-primary" type="button" id="guardar-tipo-usuario">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!--End usuario Modal -->