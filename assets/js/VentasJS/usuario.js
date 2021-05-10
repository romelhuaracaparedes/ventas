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