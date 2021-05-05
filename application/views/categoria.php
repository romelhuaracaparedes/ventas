
<div class="container-fluid">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Categoría</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Almacen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categoría</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <button class="btn ripple btn-primary" id="agregar-categoria">
                        <i class="fe fe-plus mr-2"></i> Agregar nuevo
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
                            <table class="table" id="tablacategorias">
                                
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
<div class="modal" id="modal-categoria">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="titulo_modal"></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row py-2">

                        <input type="hidden" id="id_categoria">
                        <div class="col-md-6">
                            <label for="tipo-usuario">Nombre de Categoría</label>
                            <input type="text" class="form-control" id="nombre_categoria" placeholder="">
                        </div>
                        <div class="col-md-6 pt-md-0 pt-3">
                            <p class="mb-2">Estado</p>
                            <label class="custom-switch">
                                <input type="checkbox" name="estado" id="estado_categoria" class="custom-switch-input" checked>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Activo</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary" type="button" id="btn-cancelar">Cancelar</button>
                <button class="btn ripple btn-primary" type="button" id="btn-guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!--End usuario Modal -->

