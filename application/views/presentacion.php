<div class="container-fluid">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Presentación</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Almacen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Presentación</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a class="btn ripple btn-primary" data-target="#agregar-presentacion" data-toggle="modal" href="#">
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
                            <table class="table" id="example2">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th class="wd-10p">N°</th>
                                        <th class="wd-20p">Nombre de Presentación</th>
                                        <th class="wd-20p">Siglas</th>
                                        <th class="wd-15p">Estado</th>
                                        <th class="wd-20p">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: center;">
                                        <td> 1</td>                                       
                                        <td> Presentación 1</td>
                                        <td> Sigla 1</td>
                                        <td><span class="badge badge-pill badge-primary-light">Activo</span></td>
                                        <td> 
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-edit" ></i></button> 
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash" ></i></button>
                                         </td>
                                    </tr>
                                    
                                    <tr style="text-align: center;">
                                        <td> 2</td>                                       
                                        <td> Presentación 2</td>
                                        <td> Sigla 2</td>
                                        <td><span class="badge badge-pill badge-primary-light">Activo</span></td>
                                        <td> 
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-edit" ></i></button> 
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash" ></i></button>
                                         </td>
                                    </tr>
                                </tbody>
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
<div class="modal" id="agregar-presentacion">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Registro de Presentación</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="tipo-usuario">Nombre de Presentación:</label>
                            <input type="text" class="form-control" id="nombre_presentacion" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label for="tipo-usuario">Siglas: </label>
                            <input type="text" class="form-control" id="siglas_presentacion" placeholder="">
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