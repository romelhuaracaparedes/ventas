<?php //print_r($keys);exit(); ?>
<div class="container-fluid">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Deuda S/. </h2>
                <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pedidos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pagos</li>
                </ol> -->
            </div>
            <div class="d-flex">
                <div class="justify-content-center">
                    <a href="/ventas/content/venta/listar" class="btn ripple btn-primary" id="agregar-producto">
                        <i class="fe fe-arrow-left mr-2"></i> Regresar
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
                        <div>
                            <h6 class="main-content-label mb-1">
                            Pagos realizados
                            <button class="btn btn-light btn-sm" id="agregar-pago"><i class="fe fe-plus mr-2"></i>Agregar</button>
                            </h6>
                        </div>
                        <div class="row">
                            <?php  
                        $i =0;
                        $total =0;
                        foreach ($pagos as $key => $val) { $i++;?>
                            <?php $total +=  $val['monto']  ?> 
                            <div class="col-md-3 col-xs-6">
                                <div class="list-card mt-4">
                                <div class="d-flex">
                                    <div class="demo-avatar-group my-auto float-right">
                                        <div class="Design"><b><?php echo $i; ?>. Couta</b> <i class="fa fa-money"></i></div>
                                    </div>
                                    <div class="ml-auto float-right">
                                        <div class="">
                                            <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                <a class="dropdown-item" href="#">Reporte</a>
                                                <a class="dropdown-item" href="#">
                                                    Editar
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-item mt-4">
                                    <div class="card-item-body">
                                        <div class="card-item-stat">
                                            <small class="tx-10 text-primary font-weight-semibold"> <b>Fecha:</b> <?php echo date("d/m/Y", strtotime($val['fecha_pago'] )) ?></small>
                                            <h6 class=" mt-2"> <b>Monto:</b> S/. <?php echo $val['monto'] ?> </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        <?php } ?>
                        </div>
                        
                            


                    </div>
                    <div class="card-footer">
                       <h6 class="main-content-label mb-1">
                        Monto Total del Pedido: S/. <?php echo $retVal = (isset($pagos[0]['total'])) ? $pagos[0]['total'] : "0"; ?><br>
                        Total Pagado: S/.<?php echo $total ; ?> <br>
                        RESTA Pagar: S/.<?php echo $retVal-$total  ; ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
</div>



<!-- Modals -->

<div class="modal" id="modal-pago">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">

                <h6 class="modal-title" id="titulo-modal-pago"></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="text" name="venta" id="venta" value="<?php echo $keys['venta'] ?>" hidden>
                    <input type="text" name="cliente" id="cliente" value="<?php echo $keys['cliente'] ?>" hidden>
                    <input type="text" name="total" id="total" value="<?php echo $retVal  ?>" hidden>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                        <b>Monto:</b>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 ">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">S/. </span>
                            </div><input aria-describedby="basic-addon1" aria-label="monto" class="form-control c_monto" placeholder="_ _ _ _ _" name="monto" type="text" autocomplete="false">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center mt-3">
                        <button type="button" class="btn btn-secondary cancelar_pago"><i class="fe fe-time"></i> Cancelar</button>
                        <button type="button" id="guardar_pago" class="btn btn-primary"><i class="fe fe-save"></i> Guardar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>