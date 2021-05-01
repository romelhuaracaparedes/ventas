<div class="container-fluid">
                <div class="inner-body">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div>
                            <h2 class="main-content-title tx-24 mg-b-5">Ventas</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Vendedor</a></li>
                                <li class="breadcrumb-item active" aria-current="page">pedido</li>
                            </ol>
                        </div>
                    </div>
                    <!-- End Page Header -->

                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="row py-2">
                                        <div class="col-md-4">
                                            <label for="cliente">Seleccionar Cliente</label>
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Digitar cliente..." type="text">
                                                <span class="input-group-btn"><button class="btn ripple btn-primary" type="button">
                                                        <span class="input-group-btn"><i class="fa fa-plus"></i></span></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 pt-md-0 pt-3">
                                            <label for="documento">N° documento</label>
                                            <input type="text" class="form-control" id="documento">
                                        </div>
                                        <div class="col-md-4 pt-md-0 pt-3">
                                            <label for="dirección">Dirección</label>
                                            <input type="text" class="form-control" id="direccion">
                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-4 pt-md-0 pt-3">
                                            <label for="telefono">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="igv">Fecha de pedido</label>
                                            <input class="form-control" id="dateMask" placeholder="MM/DD/YYYY" type="text">
                                        </div>

                                        <div class="col-md-4 pt-md-0 pt-3">
                                            <label for="delular">Fecha de entrega</label>
                                            <input class="form-control" id="dateMask2" placeholder="MM/DD/YYYY" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row row-sm">
                        <div class="col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="row py-2">
                                        <div class="col-md-12 pb-4">

                                            <div class="input-group">
                                                <input class="form-control" placeholder="Digitar producto..." type="text">
                                                <span class="input-group-btn"><button class="btn ripple btn-primary" type="button">
                                                        <span class="input-group-btn">Agregar</span></button>
                                                </span>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="table-responsive border">
                                                <table class="table text-nowrap text-md-nowrap mg-b-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Cant.</th>
                                                            <th>Descripción</th>
                                                            <th>P.Unit</th>
                                                            <th>Importe</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th>1</th>
                                                            <td>Joan Powell</td>
                                                            <td>Associate Developer</td>
                                                            <td>$450,870</td>
                                                        </tr>
                                                        <tr>
                                                            <th>2</th>
                                                            <td>Gavin Gibson</td>
                                                            <td>Account manager</td>
                                                            <td>$230,540</td>
                                                        </tr>
                                                        <tr>
                                                            <th>3</th>
                                                            <td>Julian Kerr</td>
                                                            <td>Senior Javascript Developer</td>
                                                            <td>$55,300</td>
                                                        </tr>
                                                        <tr>
                                                            <th>4</th>
                                                            <td>Cedric Kelly</td>
                                                            <td>Accountant</td>
                                                            <td>$234,100</td>
                                                        </tr>
                                                        <tr>
                                                            <th>5</th>
                                                            <td>Samantha May</td>
                                                            <td>Junior Technical Author</td>
                                                            <td>$43,198</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  d-flex justify-content-end b-0">
                                        <div class="col-md-3 col-sm-4 col-9 ">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span style="width:80px;" class="input-group-text" id="basic-addon1">Sub total</span>
                                                </div><input class="form-control" type="text">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row  d-flex justify-content-end b-0">
                                        <div class="col-md-3 col-sm-4 col-9 ">

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span style="width:80px;" class="input-group-text" id="basic-addon1">I.G.V </span>
                                                </div><input class="form-control" type="text">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-md-3 col-sm-4 col-9 ">

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span style="width:80px;" class="input-group-text" id="basic-addon1">Total </span>
                                                </div><input class="form-control" type="text">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-md-12 pt-2 d-flex justify-content-end">
                                            <button class="btn ripple btn-secondary mr-2" type="button">Proforma</button>
                                            <button class="btn ripple btn-primary" type="button">Pedir</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>











                </div>
            </div>