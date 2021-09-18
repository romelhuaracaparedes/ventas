<!DOCTYPE html>
<html lang="es">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8">
    <base href="" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Favicon -->
    <link rel="icon" href="<?=base_url()?>assets/img/brand/favicon.ico" type="image/x-icon" />

    <!-- Title -->
    <title>Sistema de Ventas</title>

    <!-- Bootstrap css-->
    <link href="<?=base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    

    <!-- Icons css-->
    <link href="<?=base_url()?>assets/plugins/web-fonts/icons.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/web-fonts/plugin.css" rel="stylesheet" />

    <!-- Style css-->
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/skins.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/dark-style.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/colors/default.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/jquery.toast.css" rel="stylesheet">
    

    
    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/css/colors/color.css" />

    <!-- Select2 css-->
    <link href="<?=base_url()?>assets/plugins/select2/css/select2.min.css" rel="stylesheet"/>

    <!-- SweetAlert css-->
    <link href="<?=base_url()?>assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet"/>

    <!-- Sidemenu css-->
    <link href="<?=base_url()?>assets/css/sidemenu/sidemenu.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/css/sidemenu/sidemenu-closed.css" rel="stylesheet"/>

    <!-- Switcher css-->
    <link href="<?=base_url()?>assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/switcher/demo.css" rel="stylesheet">



    <!-- Internal DataTables css-->
    <link href="<?=base_url()?>assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    

</script>


</head>

<body class="main-body leftmenu">


    <!-- Loader -->
    <div id="global-loader">
        <img src="<?=base_url()?>assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page">

        <!-- Sidemenu -->
        <div class="main-sidebar main-sidebar-sticky side-menu">
            <div class="sidemenu-logo">
                <a class="main-logo" href="<?=base_url()?>content/usuario/perfil">
                    <img src="<?=base_url()?>assets/img/brand/logo-light.png" class="header-brand-img desktop-logo" alt="logo" style="width: 150px;">
                    <img src="<?=base_url()?>assets/img/brand/icon-light.png" class="header-brand-img icon-logo" alt="logo">
                    <img src="<?=base_url()?>assets/img/brand/logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
                    <img src="<?=base_url()?>assets/img/brand/icon.png" class="header-brand-img icon-logo theme-logo" alt="logo">
                </a>
            </div>
            <div class="main-sidebar-body">
                <ul class="nav">
                    <li class="nav-header"><span class="nav-label">Menu</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url()?>">
                            <span class="shape1">
                            </span><span class="shape2">
                            </span><i class="ti-home sidemenu-icon"></i>
                            <span class="sidemenu-label">Mi perfil</span>
                        </a>
                    </li>

                    <?php
                        $perfil = $_SESSION["usuario_login"]["id_tipo_usuario"];
                    ?>
                    
                     <?php if($perfil == 1){?>
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="#">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-user sidemenu-icon"></i>
                                <span class="sidemenu-label">Usuario</span>
                                <i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?=base_url()?>content/usuario">Lista Usuarios</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?=base_url()?>content/usuario/tipousuario">Tipo Usuario</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>


                    <?php if($perfil == 1 || $perfil == 2){?>
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="#">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-shopping-cart-full sidemenu-icon"></i>
                                <span class="sidemenu-label">Ventas</span>
                                <i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?=base_url()?>content/venta">Venta</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?=base_url()?>content/venta/listar">Lista Ventas</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if($perfil == 1 || $perfil == 2){?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>content/deuda/listar">
                                <span class="shape1">
                                </span><span class="shape2">
                                </span><i class="ti-money sidemenu-icon"></i>
                                <span class="sidemenu-label">Deudas</span>
                            </a>
                        </li>

                    <?php } ?>

                    <?php if($perfil == 1 || $perfil == 3){?>
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="#">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-package sidemenu-icon"></i>
                                <span class="sidemenu-label">Almacen</span>
                                <i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?=base_url()?>content/categoria">Categoría</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?=base_url()?>content/presentacion">Presentación</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?=base_url()?>content/marca">Marca</a>
                                </li>
                                <li class="nav-sub-item">
                                    <a class="nav-sub-link" href="<?=base_url()?>content/producto">Producto</a>
                                </li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if($perfil == 1){?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>content/precio/">
                                <span class="shape1">
                                </span><span class="shape2">
                                </span><i class="ti-wallet sidemenu-icon"></i>
                                <span class="sidemenu-label">Precios</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if($perfil == 1 || $perfil == 3){?>
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="#">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-bar-chart-alt sidemenu-icon"></i>
                                <span class="sidemenu-label">Reportes</span>
                                <i class="angle fe fe-chevron-right"></i></a>
                            <ul class="nav-sub">

                                <?php if($perfil == 1){?>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="<?=base_url()?>content/reporte/venta">Venta</a>
                                    </li>
                                <?php } ?>

                                <?php if($perfil == 3){?>
                                    <li class="nav-sub-item">
                                        <a class="nav-sub-link" href="<?=base_url()?>content/reporte/pedido">Pedido</a>
                                    </li>
                                <?php } ?>                                
                            </ul>
                        </li>
                    <?php } ?>
              
                </ul>
            </div>
        </div>
        <!-- End Sidemenu -->
        <!-- Main Header-->
        <div class="main-header side-header sticky">
            <div class="container-fluid">

                <div class="main-header-left">
                    <a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
                </div>
                <div class="main-header-center">

            

                    <div class="responsive-logo">
                        <a href="index.html"><img src="<?=base_url()?>assets/img/brand/logo.png" class="mobile-logo" alt="logo"></a>
                        <a href="index.html"><img src="<?=base_url()?>assets/img/brand/logo-light.png" class="mobile-logo-dark" alt="logo"></a>
                    </div>
                </div>
                <div class="main-header-right">
              
               
                    <div class="dropdown d-md-flex full-screen-link">
                        <a class="nav-link icon " href="#">
                            <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                            <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                    </div>
                    
                    <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="#">
                            <span class="main-img-user"><img alt="avatar" src="<?=base_url()?>assets/img/users/1.jpg"></span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="header-navheading">
                                <h6 class="main-notification-title">Bienvenido</h6>
                            </div>
                            <a class="dropdown-item border-top" href="<?=base_url()?>content/usuario/perfil">
                                <i class="fe fe-user"></i> Mi perfil
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>login/cerrarSesion">
                                <i class="fe fe-power"></i> Cerrar Sesión
                            </a>
                        </div>
                    </div>
                    
                    <button class="navbar-toggler navresponsive-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
                    </button>
                    <!-- Navresponsive closed -->
                </div>
            </div>
        </div>
        <!-- End Main Header-->

        <!-- Mobile-header -->
        <div class="mobile-main-header">
            <div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark  ">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                    <div class="d-flex order-lg-2 ml-auto">
                        
                        <div class="dropdown full-screen-link">
                            <a class="nav-link icon ">
                                <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i>
                                <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                            </a>
                        </div>
                        
                        <div class="dropdown main-profile-menu">
                            <a class="d-flex" href="#">
                                <span class="main-img-user"><img alt="avatar" src="<?=base_url()?>assets/img/users/1.jpg"></span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="header-navheading">
                                    <h6 class="main-notification-title">Bienvenido</h6>
                                </div>
                                <a class="dropdown-item border-top" href="usuario/perfil">
                                    <i class="fe fe-user"></i> Mi perfil
                                </a>
                                <!-- <a class="dropdown-item" href="profile.html">
                                    <i class="fe fe-edit"></i> Edit Profile
                                </a>
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fe fe-settings"></i> Account Settings
                                </a>
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fe fe-settings"></i> Support
                                </a>
                                <a class="dropdown-item" href="profile.html">
                                    <i class="fe fe-compass"></i> Activity
                                </a> -->
                                <a class="dropdown-item" href="<?php echo base_url(); ?>login/cerrarSesion">
                                    <i class="fe fe-power"></i> Cerrar Sesión
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile-header closed -->
        <!-- Main Content-->
        <div class="main-content side-content pt-0">
