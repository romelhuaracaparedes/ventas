<div class="container-fluid">
                <div class="inner-body">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div>
                            <h2 class="main-content-title tx-24 mg-b-5">Perfil de usuario</h2>
                            
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Usuario</a></li>
                                <li class="breadcrumb-item active" aria-current="page">perfil</li>
                            </ol>
                        </div>
                    </div>
                    <!-- End Page Header -->

                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-xl-3 col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <h3 class="main-content-label">Vendedor</h3>
                                </div>
                                <div class="card-body text-center item-user">
                                    <div class="profile-pic">
                                        <div class="profile-pic-img">
                                            <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span>
                                            <img src="<?=base_url()?>assets/img/users/1.jpg" class="rounded-circle" alt="user">
                                        </div>
                                        <a href="#" class="text-dark">
                                            <h5 class="mt-3 mb-0 font-weight-semibold">Sonia Altamirano</h5>
                                        </a>
                                    </div>
                                </div>
                                <ul class="item1-links nav nav-tabs  mb-0">

                                    <li class="nav-item">
                                        <a data-target="#perfil" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-user icon1"></i> Datos personales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-target="#cambio-clave" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-reload icon1"></i> Cambiar clave</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="perfil" role="tabpanel">

                                            <div class="py-2">
                                                <div class="row py-2">
                                                    <div class="col-md-6">
                                                        <label for="nombres">Nombres</label>
                                                        <input type="text" class="form-control" id="nombres">
                                                    </div>
                                                    <div class="col-md-6 pt-md-0 pt-3">
                                                        <label for="ape-paterno">Apellido paterno</label>
                                                        <input type="text" class="form-control" id="ape-paterno">
                                                    </div>
                                                </div>
                                                <div class="row py-2">
                                                    <div class="col-md-6">
                                                        <label for="ape-materno">Apellido materno</label>
                                                        <input type="text" class="form-control" id="ape-materno">
                                                    </div>
                                                    <div class="col-md-6 pt-md-0 pt-3">
                                                        <label for="correo">Correo</label>
                                                        <input type="text" class="form-control" id="correo">
                                                    </div>
                                                </div>
                                                <div class="row py-2">
                                                    <div class="col-md-6">
                                                        <label for="celular">Celular</label>
                                                        <input type="tel" class="form-control" id="celular">
                                                    </div>
                                                    <div class="col-md-6 pt-md-0 pt-3">
                                                        <label for="telefono">Teléfono</label>
                                                        <input type="tel" class="form-control" id="telefono">
                                                    </div>
                                                </div>
                                                <div class="row py-2">
                                                    <div class="col-md-6">
                                                        <label for="tipo-documento">Tipo de documento</label>
                                                        <select name="tipo-documento" id="tipo-documento" class="select2-no-search">
															<option value="1" selected>DNI</option>
															<option value="2">Carnet de extranjería</option>
														</select>
                                                    </div>
                                                    <div class="col-md-6 pt-md-0 pt-3">
                                                        <label for="num-documento">N° de documento</label>
                                                        <input type="text" class="form-control" id="num-documento">
                                                    </div>
                                                </div>
                                                <div class="p-4 text-center">
                                                    <a href="#" class="btn btn-primary">Actualizar</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="cambio-clave" role="tabpanel">

                                            <div class="py-2">
                                                <div class="row py-2">
                                                    <div class="col-md-5">
                                                        <label for="nueva-contrasena">Nueva contraseña</label>
                                                        <input type="password" class="form-control" placeholder="Ingrese nueva contraseña" id="nueva-contrasena">
                                                    </div>
                                                    <div class="col-md-5 pt-md-0 pt-3">
                                                        <label for="rep-nueva-contrasena">Repetir nueva contraseña</label>
                                                        <input type="password" class="form-control" placeholder="Repita su nueva contraseña" id="rep-nueva-contrasena">
                                                    </div>
                                                    <div class="col-md-2 pt-md-0 pt-3">
                                                        <label for="rep-nueva-contrasena" class="invisible">R</label>
                                                        <a href="#" class="btn btn-primary btn-block">Actualizar</a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row -->











                </div>
            </div>