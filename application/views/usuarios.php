<div class="container-fluid">
                <div class="inner-body">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div>
                            <h2 class="main-content-title tx-24 mg-b-5">Usuarios</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Administrador</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Registrar</li>
                            </ol>
                        </div>
                        <div class="d-flex">
                            <div class="justify-content-center">
                            <button class="btn ripple btn-primary" id="agregar-usuario">
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
                                        <table class="table" id="tablausuarios">
                                    
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
            <div class="modal" id="modal-usuario">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            
                        <h6 class="modal-title" id="titulo_modal-usuario"></h6>
                        <button aria-label="Close" class="close btn-cancelar-usuario"  type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        </div>
                        <div class="modal-body">
                            <form id="form-usuario">

                                <div class="row py-2">
                                    <input type="hidden" id="id_usuario">
                                    <div class="col-md-4">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="apelldio_paterno">Apellido paterno</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellio_paterno">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="apellido_materno">Apellido materno</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno">
                                    </div>
                                </div>


                                <div class="row py-2">
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="correo">Correo</label>
                                        <input type="text" class="form-control" id="correo" name="correo">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="tipo_documento">Tipo de documento</label>
                                        <select class="form-control" name="tipo_documento" id="tipo_documento" >
											<option value="1" selected>DNI</option>
											<option value="2">Carnet de extranjería</option>
										</select>
                                    </div>
                                    
                                    <!-- class="select2-no-search" -->
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-4">
                                        <label for="num_documento">N° de documento</label>
                                        <input type="text" class="form-control" id="num_documento" name="num_documento">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="tipo_usuario">Tipo de usuario:</label>
                                        <select class="form-control" id="tipo_usuario" name="tipo_usuario">
                                            <option value="">SELECCIONE</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <p class="mb-2">Estado</p>
                                        <label class="custom-switch">
                                            <input type="checkbox" name="estado_usuario" id="estado_usuario" class="custom-switch-input" checked>
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Activo</span>
                                        </label>

                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">

                            <button class="btn ripple btn-secondary btn-cancelar-usuario" type="button">Cancelar</button>
                            <button class="btn ripple btn-primary" id="guardar-usuario" type="button">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--End usuario Modal -->