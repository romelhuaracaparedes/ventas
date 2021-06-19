
<style type="text/css">
    .list_eleccion :hover{
        background-color: white;
        border-radius: 1em;
    }
</style>

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
            <div class="d-flex">
                <div class="justify-content-center">

                    <a href="/ventas/content/venta/listar" type="button" class="btn btn-primary my-2 btn-icon-text">
                       <i class="fe fe-arrow-left mr-2"></i> Regresar a Lista
                    </a>
                </div>
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

                                <input type="hidden" id="txtIdVenta">
                                <label for="cliente">Seleccionar Cliente</label>
                                
                                <div class="input-group" style="flex-wrap:nowrap;">
                                    <select class="form-control select2" name="cliente" id="slccliente" >
                                        <option></option>
                                        <?php if ($clientes) { ?>
                                            <?php foreach ($clientes as $dist) { ?>
                                                <option value="<?php echo $dist['id_cliente']; ?>" data-ndocumento="<?php echo $dist['numero_documento']; ?>" data-direccion="<?php echo $dist['direccion']; ?>"  data-celular="<?php echo $dist['celular']; ?>"><?php echo utf8_encode($dist['nombres']); ?></option>
                                            <?php } ?>
                                        <?php } ?>
											
                                    </select> 
                                    <span class="input-group-btn">
                                        <button class="btn ripple btn-primary" type="button" id="agregar-cliente">
                                            <span class="input-group-btn"><i class="fa fa-plus"></i></span>
                                        </button>
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
                                
								<div class="mg-b-20">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fe fe-calendar lh--9 op-6"></i>
											</div>
                                        </div>
                                        <input class="form-control" id="fechapedido" placeholder="dd/mm/yyyy" type="text">
									</div>
								</div>
								
                            </div>
                            <div class="col-md-4 pt-md-0 pt-3">
                                <label for="delular">Fecha de entrega</label>
                                <div class="mg-b-20">
									<div class="input-group">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<i class="fe fe-calendar lh--9 op-6"></i>
											</div>
                                        </div>
                                        <input class="form-control" id="fechaentrega" placeholder="dd/mm/yyyy" type="text">
									</div>
								</div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-12 pt-2 d-flex justify-content-end">
                                <button class="btn ripple btn-primary" type="button" id="guardar_general">Guardar</button>
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
                            <!-- <div class="col-md-4 pt-md-0 pt-3">
                                <label for="documento">N° documento</label>
                                <input type="text" class="form-control" id="documento">
                            </div> -->
                            <div class="col-md-8 pb-4">                                            
                                    <label for="producto">Producto</label>
                                    
                                    <select class="form-control select2" name="producto" id="slctproducto" >
                                        <option></option>
                                        <?php if ($productos) { ?>
                                            <?php foreach ($productos as $dist) { ?>
                                                <option value="<?php echo $dist['id_producto']; ?>" data-stock="<?php echo $dist['stock']; ?>" data-preciounit="<?php echo $dist['precio_venta_unit']; ?>"><?php echo utf8_encode($dist['nombre_producto']); ?></option>
                                            <?php } ?>
                                        <?php } ?>
											
											
									</select>                                         
                            </div>
                            <div class="col-md-1 pb-4">
                                
                                <label for="stock">Stock</label>    
                                <input class="form-control" type="text" id="stock" disabled>
                            </div>
                            
                            <div class="col-md-1 pb-4">
                                <label for="cantidad">Cantidad</label>  
                                <input class="form-control" type="text" id="cantidad">
                                
                            </div>
                            <div class="col-md-2 pb-4 ">
                                     <label for="cantidad" class="invisible">.</label>  
                                    <button class="btn ripple btn-primary btn-block" id="agregar-producto">
                                        <i class="fe fe-plus mr-2"></i> Agregar
                                    </button>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive border">
                                    <table class="table text-nowrap text-md-nowrap mg-b-0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Cant.</th>
                                                <th>Descripción</th>
                                                <th>P.Unit</th>
                                                <th>Importe</th>
                                            </tr>
                                        </thead>
                                        <tbody id="detalle_venta">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row  d-flex justify-content-end b-0">
                            <div class="col-md-3 col-sm-4 col-9 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span style="width:80px;" class="input-group-text" id="basic-addon1" >Sub total</span>
                                    </div><input class="form-control" type="text" id="sub_total">
                                </div>
                            </div>
                        </div>
                        <div class="row  d-flex justify-content-end b-0">
                            <div class="col-md-3 col-sm-4 col-9 ">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span style="width:80px;" class="input-group-text" id="basic-addon1">I.G.V </span>
                                    </div><input class="form-control" type="text" value="18%" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-3 col-sm-4 col-9 ">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span style="width:80px;" class="input-group-text" >Total </span>
                                    </div><input class="form-control" type="text" id="total">
                                </div>
                            </div>
                        </div>
                        <div class="row py-2 d-block defa_pedido">
                            <div class="col-md-12 pt-2 d-flex justify-content-end">
                                <button class="btn ripple btn-secondary mr-2 generarComprobante" id="generarProforma" type="button">Imprimir Proforma</button>
                                <button class="btn ripple btn-primary" id="realizar-pedido" type="button">Hacer Pedido</button>
                            </div>
                        </div>
                        <div class="row py-2 d-none exit_pedido">
                            <div class="col-md-12 block-2 d-flex justify-content-end">
                                <button class="btn ripple btn-info mr-2 generarComprobante" id="generarProforma" type="button">Imprimir Pedido</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- cliente Modal -->
<div class="modal" id="modal-cliente">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">

                <h6 class="modal-title" id="titulo-modal-cliente"></h6>
                <button aria-label="Close" class="close btn-cancelar"  type="button">
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
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="cireccion" name="direccion">
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

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn ripple btn-secondary btn-cancelar" type="button">Cancelar</button>
                <button class="btn ripple btn-primary" id="guardar-cliente" type="button">Guardar</button>
            </div>
        </div>
    </div>
</div>
<!--End usuario Modal -->



<!-- pedido Modal -->
<div class="modal" id="modal-pedido">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">

                <h6 class="modal-title titulo-modal-cliente" id="titulo-modal-cliente"></h6>
                
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="opciones">
                    <div class="row py-2 ">
                        <input type="hidden" id="id_usuario">
                        <div class="col-md-6 col-sm-6 col-xs-6 ">
                            <div class="list-card list_eleccion" onclick="pago(1)">
                                <div class="card-body text-center contado">
                                    <div class="icon-service bg-info-transparent rounded-circle text-info">
                                        <i class="fe fe-dollar-sign"></i>
                                    </div>
                                    <p class="mb-1 text-muted" style="color: #6259ca !important;"><b> Pago al Contado</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 ">
                            <div class="list-card list_eleccion">
                                <div class="card-body text-center " onclick="pago(2)">
                                    <div class="icon-service bg-info-transparent rounded-circle text-info">
                                        <i class="fe fe-scissors"></i>
                                    </div>
                                    <p class="mb-1 text-muted" style="color: #6259ca !important;"> <b>Pago Fraccionado</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none formulario_pago">
                    <div class="row py-2 ">
                        <input type="hidden" id="id_usuario">

                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <b>Registrar <span class="option"></span> Pago</b>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                                    <b>Monto:</b>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">

                                    <div class="input-group mb-3">
                                        <input type="text" name="" class="tipo_pago">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">S/. </span>
                                        </div><input aria-describedby="basic-addon1" aria-label="monto" class="form-control c_monto" placeholder="_ _ _ _ _" name="monto"type="text">
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center mt-3">
                                    <button type="button" class="btn btn-secondary regresar"><i class="fe fe-arrow-left"></i> Regresar</button>
                                    <button type="button" id="guardar_pago" class="btn btn-primary"><i class="fe fe-save"></i> Guardar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end pedido  -->

