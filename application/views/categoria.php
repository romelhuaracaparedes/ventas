
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
                    <a class="btn ripple btn-primary" data-target="#agregar-categoria" data-toggle="modal" href="#">
                        <i class="fe fe-plus mr-2"></i> Agregar nuevo
                    </a>
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
<div class="modal" id="agregar-categoria">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Registro de Categoría</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="tipo-usuario">Nombre de Categoría</label>
                            <input type="text" class="form-control" id="nombre_categoria" placeholder="">
                        </div>
                        <div class="col-md-6 pt-md-0 pt-3">
                            <p class="mb-2">Estado</p>
                            <label class="custom-switch">
                                <input type="checkbox" name="estado" class="custom-switch-input">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Activo</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancelar</button>
                <button class="btn ripple btn-primary" type="button">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!--End usuario Modal -->

