<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codeigniter.spruko.com/spruha/spruha-ltr/pages/signin by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 19:36:32 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
  
    <!-- Favicon -->
    <link rel="icon" href="<?=base_url()?>assets/img/brand/favicon.ico" type="image/x-icon" />

    <!-- Title -->
    <title>Sistemas de Ventas</title>

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

    <!-- Color css-->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/css/colors/color.css" />

    <!-- Select2 css-->
    <link href="<?=base_url()?>assets/plugins/select2/css/select2.min.css" rel="stylesheet">

    <!-- Sidemenu css-->
    <link href="<?=base_url()?>assets/css/sidemenu/sidemenu.css" rel="stylesheet">

    <!-- Switcher css-->
    <link href="<?=base_url()?>assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/switcher/demo.css" rel="stylesheet">


</head>

<body class="main-body leftmenu">

    <!-- Loader -->
    <div id="global-loader">
        <img src="<?=base_url()?>assets/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- End Loader -->

    <!-- Page -->
    <div class="page main-signin-wrapper">

        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="row row-sm">
                        <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
                            <div class="mt-5 pt-4 p-2 pos-absolute">
                                <img src="<?=base_url()?>assets/img/brand/logo-light.png" class="header-brand-img mb-4" alt="logo">
                                <div class="clearfix"></div>
                                <img src="<?=base_url()?>assets/img/svgs/image-login.svg" class="ht-100 mb-0" alt="user">
                                <h5 class="mt-4 text-white">Entregando de manera segura, entregando todo.</h5>
                                <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Dedicados a servir, de manera eficiente y confiable</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form ">
                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">

                                        <form id="form-login">
                                            <h5 class="text-left mb-2">Iniciar sesión en su cuenta</h5>
                                            <br>
                                            
                                            <div class="form-group text-left">
                                                <input type="hidden" id="token"  value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                
                                                
                                            </div>
                                            <div class="form-group text-left">
                                                <label>Usuario</label>
                                                <input class="form-control" placeholder="Ingrese su usuario" type="text" name="usuario" id="usuario" >
                                            </div>
                                            <div class="form-group text-left">
                                                <label>Contraseña</label>
                                                <input class="form-control" placeholder="Ingrese su contraseña" type="password" name="contrasena" id="contrasena" >
                                            </div>
                                            <div class="mensaje-login">

                                            </div>
                                            
                                            <button id="ingresar" type="button" class="btn ripple btn-main-primary btn-block">Iniciar sesión</button>
                                        </form>
                                        <div class="text-left mt-5 ml-0">
                                            <div class="mb-1"><a href="#">¿Olvidaste tu contraseña?</a></div>
                                            <div>¿No tiene una cuenta? <a href="tel:+51976827567">solicitar al proveedor</a></div>
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
    <!-- End Page -->

    <!-- Jquery js-->
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap js-->
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Select2 js-->
    <script src="<?=base_url()?>assets/plugins/select2/js/select2.min.js"></script>

    <!-- Custom js -->
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.validate.js"></script>
    <!-- <script src="<?=base_url()?>assets/js/VentasJS/usuario.js"></script> -->
    <script src="<?=base_url()?>assets/js/messages_es.js"></script>

    <script>

$('#ingresar').click(function(e) {
    var obj = {};
    obj.usuario = $("#usuario").val();
    obj.clave = $("#contrasena").val();
    obj.csrf_patbin_tkn = $("#token").val();

    var form = $('#form-login');
    var formulario = form.validate({
        errorElement: 'div',
        rules: {
            usuario: {
                required: true
            },
            contrasena: {
                required: true
            }
        }

    });

    if (!formulario.form()) {
        return;
    } else {
        $.ajax({
            type: 'POST',
            async: true,
            data: obj,
            url: 'login/validar',
            success: function(response) {
                if (response.status == "success") {
                    document.location.href = 'content/usuario/perfil';
                } else {
                    $('.mensaje-login').html('<div class="alert alert-danger mg-b-0" role="alert"><button aria-label="Close" class="close" data-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> ' + response.msg + ' </div>');
                    $('.mensaje-login').addClass("mb-3");
                }
            },
            error: function(err) {
                console.log("error de servidor");
            }
        });
    }
});

    </script>

</body>

<!-- Mirrored from codeigniter.spruko.com/spruha/spruha-ltr/pages/signin by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Apr 2021 19:36:33 GMT -->

</html>