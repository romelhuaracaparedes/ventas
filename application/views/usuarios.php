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
                                <a class="btn ripple btn-primary" data-target="#agregar-usuario" data-toggle="modal" href="#">
                                    <i class="fe fe-plus mr-2"></i> Agregar nuevo
                                </a>


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
                                        <table class="table" id="example2">
                                            <thead>
                                                <tr>
                                                    <th >Nombre</th>
                                                    <th >Apellido paterno</th>
                                                    <th >Apelido materno</th>
                                                    <th >Celular</th>
                                                    <th >Perfil</th>
                                                    <th >Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>Romel</td>
                                                    <td>Huaraca</td>
                                                    <td>Paredes</td>
                                                    <td>999001270</td>
                                                    <td>Administrador</td>
                                                    <td>Activo</td>
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
            <div class="modal" id="agregar-usuario">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Registro de usuario</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form>

                                <div class="row py-2">
                                    <div class="col-md-4">
                                        <label for="nombres">Nombres</label>
                                        <input type="text" class="form-control" id="nombres">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="apelldio-paterno">Apellido paterno</label>
                                        <input type="text" class="form-control" id="apellio-materno">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="apellido-materno">Apellido materno</label>
                                        <input type="text" class="form-control" id="apellido-materno">
                                    </div>
                                </div>


                                <div class="row py-2">
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="correo">Correo</label>
                                        <input type="text" class="form-control" id="correo">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="form-control" id="celular">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="tipo-documento">Tipo de documento</label>
                                        <select name="tipo-documento" id="tipo-documento" class="select2-no-search">
											<option value="1" selected>DNI</option>
											<option value="2">Carnet de extranjería</option>
										</select>
                                    </div>
                                    
                                    
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-4">
                                        <label for="num-documento">N° de documento</label>
                                        <input type="text" class="form-control" id="num-documento">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="tipo-usuario">Tipo de usuario</label>
                                        <select name="tipo-usuario" id="tipo-usuario" class="select2-no-search">
											<option value="1" selected>Seleccione</option>
                                            <option value="2">Administrador</option>
                                            <option value="2">Vendedor</option>
                                            <option value="3">Almacen</option>
										</select>
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
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