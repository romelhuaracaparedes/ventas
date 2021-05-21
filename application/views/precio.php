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
                    <button class="btn ripple btn-primary" id="agregar-producto">
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
                            <table class="table" id="tablaproductos">
                                
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
<div class="modal" id="modal-producto">
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
                    <input type="hidden" id="id_producto">
                    <div class="row py-2">
                        <div class="col-md-12">
                            <label for="nombre_producto">Nombre de Producto:</label>
                            <input type="text" class="form-control" id="nombre_producto" placeholder="">
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-4">
                            <label for="stock_producto">Stock:</label>
                            <input type="text" class="form-control" id="stock_producto" placeholder="">
                        </div>
                        <div class="col-md-4">
                            <label for="stockmin_producto">Stock Min:</label>
                            <input type="text" class="form-control" id="stockmin_producto" placeholder="">
                        </div>

                        <div class="col-md-4">
                            <label for="precio_producto">Precio Compra:</label>
                            <div class="input-group mb-3"> 
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text">S/.</span> 
                                    </div>
                                <input class="form-control" id="precio_compra" type="text"> 
                            </div> 
                        </div>

                        <div class="col-md-4">
                            <label for="precio_venta_unit_producto">Precio Venta Unitario:</label>
                            <div class="input-group mb-3"> 
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text">S/.</span> 
                                    </div>
                                <input class="form-control" id="precio_venta_unit_producto" type="text"> 
                            </div> 
                        </div>

                        <div class="col-md-4">
                            <label for="precio_venta_mayorista_producto">Precio Venta Mayorista:</label>
                            <div class="input-group mb-3"> 
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text">S/.</span> 
                                    </div>
                                <input class="form-control" id="precio_venta_mayorista_producto" type="text"> 
                            </div> 
                        </div>

                        <div class="col-md-4">
                            <label for="precio_venta_distribuidor_producto">Precio Venta Distribuidor:</label>
                            <div class="input-group mb-3"> 
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text">S/.</span> 
                                    </div>
                                <input class="form-control" id="precio_venta_distribuidor_producto" type="text"> 
                            </div> 
                        </div>
                    

                    </div>
                    <div class="row py-2">

                        <div class="col-md-4">
                            <label for="nombre_categoria">Categoría:</label>
                            <select class="form-control" id="nombre_categoria">
                                <option value="0">SELECCIONE</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="nombre_marca">Marca:</label>
                            <select class="form-control" id="nombre_marca">
                                <option value="0">SELECCIONE</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="nombre_presentacion">Presentación:</label>
                            <select class="form-control" id="nombre_presentacion">
                                <option value="0">SELECCIONE</option>
                            </select>
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
