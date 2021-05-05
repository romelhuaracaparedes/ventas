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

        // $('#error_ofimatica').removeClass('kt-hide').show();
        console.log("debe de validar");
        return;
    }

    form.ajaxSubmit({
        type: 'POST',
        async: true,
        url: '/convoca-proceso/guardar-ofimatica',
        success: function(response) {
            console.log("consulta exitosa");
            // if (response.estado) {

            //     $('#error_ofimatica').addClass('kt-hide').hide();
            //     swal.fire(
            //         '¡Registrado!',
            //         'Los datos fueron agregados a su tabla.',
            //         'success'
            //     ).then(resultado => {
            //         if (resultado.value) {
            //             form.clearForm();
            //             form.validate().resetForm();

            //             $('#kt_modal_ofimatica').modal('hide');
            //             $('#kt_table_ofimatica').DataTable().clear().draw(false);
            //             listarOfimatica();
            //         }

            //     });

            // } else {
            //     swal.fire(
            //         '!Error de al registrar!',
            //         'Pruebe en un momento.',
            //         'error'
            //     )
            // }
        },
        error: function(err) {
            console.log("error de servidor");
        }
    });
});