<div class="container-fluid">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Producto</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Almacen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Producto</li>
                </ol>
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a class="btn ripple btn-primary" data-target="#agregar-producto" data-toggle="modal" href="#">
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
                                        <th class="wd-20p">Nombre de Producto</th>
                                        <th class="wd-15p">Marca</th>
                                        <th class="wd-15p">Presentación</th>
                                        <th class="wd-15p">Stock Min</th>
                                        <th class="wd-15p">Stock</th>
                                        <th class="wd-15p">Precio Compra</th>
                                        <th class="wd-15p">Precio Venta</th>
                                        <th class="wd-20p">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="text-align: center;">
                                        <td> 1</td>
                                        <td> Nombre de Producto 1</td>
                                        <td> Marca 1</td>
                                        <td> Presentación 1</td>
                                        <td> 10</td>
                                        <td> 50</td>
                                        <td> 5</td>
                                        <td> 6</td>
                                        <td> 
                                            <button class="btn btn-primary btn-sm"><i class="fas fa-edit" ></i></button> 
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash" ></i></button>
                                         </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td> 2</td>
                                        <td> Nombre de Producto 2</td>
                                        <td> Marca 2</td>
                                        <td> Presentación 2</td>
                                        <td> 10</td>
                                        <td> 50</td>
                                        <td> 5</td>
                                        <td> 6</td>
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
<div class="modal" id="agregar-producto">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Registro de Producto</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="tipo-usuario">Nombre de Producto:</label>
                            <input type="text" class="form-control" id="nombre_producto" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label for="tipo-usuario">Nombre de Marca:</label>
                            <select class="form-control" id="nombre_marca">
                                <option value="0">SELECCIONE</option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-3">
                            <label for="tipo-usuario">Stock:</label>
                            <input type="text" class="form-control" id="stock_producto" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <label for="tipo-usuario">Stock Min:</label>
                            <input type="text" class="form-control" id="stockmin_producto" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <label for="tipo-usuario">Precio Compra:</label>
                            <input type="text" class="form-control" id="precio_producto" placeholder="">
                        </div>
                        <div class="col-md-3">
                            <label for="tipo-usuario">Precio Venta:</label>
                            <input type="text" class="form-control" id="precio_venta_producto" placeholder="">
                        </div>
                    </div>
                    <div class="row py-2">

                        <div class="col-md-4">
                            <label for="tipo-usuario">Categoría:</label>
                            <select class="form-control" id="nombre_categoria">
                                <option value="0">SELECCIONE</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="tipo-usuario">Marca:</label>
                            <select class="form-control" id="nombre_categoria">
                                <option value="0">SELECCIONE</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="tipo-usuario">Presentación:</label>
                            <select class="form-control" id="nombre_categoria">
                                <option value="0">SELECCIONE</option>
                            </select>
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
