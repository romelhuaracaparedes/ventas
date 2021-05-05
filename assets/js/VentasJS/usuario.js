$('#ingresar').click(function(e) {


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
    }
});