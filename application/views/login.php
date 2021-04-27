<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <base href=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>CITAS VIRTUALES - MININTER</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="<?php echo base_url(); ?>assets/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>assets/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Admin Pro</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(https://comexa.com.bo/wp-content/uploads/2015/09/Abstract-Background-White.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" method="post" autocomplete="off">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <center>
                            <img src="https://mininter.nec.pe/wp-content/uploads/2021/03/LogoMININTER.png" alt="" width="350px">
                        </center>
                        <br>
                        <h3 class="box-title m-b-20">MÓDULO DE CITAS VIRTUALES</h3>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="txtUsuario" name="usr_codigo" class="form-control" type="text" required="" placeholder="Usuario"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="txtClave" name="usr_clave" class="form-control" type="password" required="" placeholder="Contraseña"> </div>
                        </div>
                        <!-- <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-info float-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox" class="filled-in chk-col-light-blue">
                                    <label for="checkbox-signup"> Recordar credenciales </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-info btn-rounded" type="submit">Ingresar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social">
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Login with Facebook"> Crear Cuenta</a>

                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                ¿Olvidaste tu contraseña?
                                <a href="pages-register.html" class="text-info m-l-5"><br><b>Recuprar Contraseña</b></a>
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('form#loginform').submit(function(ev){
            ev.preventDefault();
            $.post('login/validar', $(this).serialize(), function(resp){
                console.log(resp);
                if(resp.status == 'success'){
                    document.location.href = 'acceso/home';
                } else{
                    alert(resp.msg);
                }
            }, 'json').fail(function(err){
                alert(err);
            });
        });

        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

</body>

</html>