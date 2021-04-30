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
                                                    <th class="wd-20p">Name</th>
                                                    <th class="wd-25p">Position</th>
                                                    <th class="wd-20p">Office</th>
                                                    <th class="wd-15p">Age</th>
                                                    <th class="wd-20p">Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>Thor Walton</td>
                                                    <td>Developer</td>
                                                    <td>New York</td>
                                                    <td>61</td>
                                                    <td>$98,540</td>
                                                </tr>
                                                <tr>
                                                    <td>Finn Camacho</td>
                                                    <td>Support Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>47</td>
                                                    <td>$87,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Serge Baldwin</td>
                                                    <td>Data Coordinator</td>
                                                    <td>Singapore</td>
                                                    <td>64</td>
                                                    <td>$138,575</td>
                                                </tr>
                                                <tr>
                                                    <td>Zenaida Frank</td>
                                                    <td>Software Engineer</td>
                                                    <td>New York</td>
                                                    <td>63</td>
                                                    <td>$125,250</td>
                                                </tr>
                                                <tr>
                                                    <td>Zorita Serrano</td>
                                                    <td>Software Engineer</td>
                                                    <td>San Francisco</td>
                                                    <td>56</td>
                                                    <td>$115,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Jennifer Acosta</td>
                                                    <td>Junior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>43</td>
                                                    <td>$75,650</td>
                                                </tr>
                                                <tr>
                                                    <td>Cara Stevens</td>
                                                    <td>Sales Assistant</td>
                                                    <td>New York</td>
                                                    <td>46</td>
                                                    <td>$145,600</td>
                                                </tr>
                                                <tr>
                                                    <td>Hermione Butler</td>
                                                    <td>Regional Director</td>
                                                    <td>London</td>
                                                    <td>47</td>
                                                    <td>$356,250</td>
                                                </tr>
                                                <tr>
                                                    <td>Lael Greer</td>
                                                    <td>Systems Administrator</td>
                                                    <td>London</td>
                                                    <td>21</td>
                                                    <td>$103,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Jonas Alexander</td>
                                                    <td>Developer</td>
                                                    <td>San Francisco</td>
                                                    <td>30</td>
                                                    <td>$86,500</td>
                                                </tr>
                                                <tr>
                                                    <td>Shad Decker</td>
                                                    <td>Regional Director</td>
                                                    <td>Edinburgh</td>
                                                    <td>51</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Michael Bruce</td>
                                                    <td>Javascript Developer</td>
                                                    <td>Singapore</td>
                                                    <td>29</td>
                                                    <td>$183,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Donna Snider</td>
                                                    <td>Customer Support</td>
                                                    <td>New York</td>
                                                    <td>27</td>
                                                    <td>$112,000</td>
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
                                    <div class="col-md-4">
                                        <label for="celular">Celular</label>
                                        <input type="text" class="form-control" id="celular">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="correo">Correo</label>
                                        <input type="text" class="form-control" id="correo">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="tipo-usuario">Tipo de usuario</label>
                                        <select name="tipo-documento" id="tipo-usuario" class="select2-no-search">
											<option value="1" selected>Seleccione</option>
											<option value="2">Administrador</option>
										</select>
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-md-4">
                                        <label for="usuario">Usuario</label>
                                        <input type="text" class="form-control" id="usuario">
                                    </div>
                                    <div class="col-md-4 pt-md-0 pt-3">
                                        <label for="clave">Clave</label>
                                        <input type="text" class="form-control" id="clave">
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