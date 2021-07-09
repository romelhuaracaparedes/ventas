<style>
    tr.group,
    tr.group:hover {
        background-color: #ddd !important;
    }
</style>
<div class="container-fluid">
    <div class="inner-body">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Reporte</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pedido</a></li>
                    <li class="breadcrumb-item active" aria-current="page">lista</li>
                </ol>
            </div>

        </div>

        <!--  -->


         <!-- Row -->
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-body">

                        <div class="row row-sm"> 
                            <div class="col-lg">
                                <div id="reportrange" style="cursor: pointer; margin-bottom:0px; padding: 7px 10px; border: 1px solid #ccc; width: 100%">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div>
                            </div>

                            <div class=" col-lg mg-sm-l-10 mg-t-10 mg-sm-t-0">
                                <button class="btn ripple btn-primary pd-x-20" type="button" id="search_report"> <i class="fa fa-search"></i> Filtrar </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tablaventas" width="100%">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->

    </div>
</div>