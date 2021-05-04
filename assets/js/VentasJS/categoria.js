var categoriaJS = {

    listar_categorias: function(callback) {

        $.post('categoria/listarCategorias', {}, function(data) {

            console.log(data);
            if (callback) {
                callback({ resp: 'ok', status: '1' });
            }
        }, 'json').fail(function(err) {
            if (callback) {
                callback({ err: err, status: '0' });
            }
        });
    },

    agregar_categoria: function(nombre, flg, callback) {

        var obj = {};
        obj.nombre_caterogia = nombre;
        obj.flg_estado = flg;
        $.post('categoria/registrarCategoria', obj, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        }, 'json').fail(function(err) {
            if (callback) {
                callback({ err: err, status: '0' });
            }
        });
    },

    editar_categoria: function() {

    },

    eliminar_categoria: function() {

    },

    limpiar_formulario: function() {

        $('#id_categoria').val('');
        $('#nombre_categoria').val('');
        $('#estado_categoria').prop('checked', true);
    }


};


$('#tablacategorias').DataTable({
    responsive: true,
    language: {
        sSearch: '',
        lengthMenu: 'Mostrar _MENU_ entradas',
    }
});


$("#btn-cancelar").click(function() {


});

$("#btn-guardar").click(function() {

    var nombre = $.trim($('#nombre_categoria').val());
    var estado = $('#estado_categoria').is(":checked");


    var msj_error = '';

    if (nombre == '') {
        msj_error += 'Ingresar Nombre de Categoría <br>';
    }


    if (msj_error == '') {
        categoriaJS.agregar_categoria(nombre, estado, function(data) {
            if (data.status == 'success') {
                ventasJS.msj.success('Aviso:', data.msg);
            } else {
                ventasJS.msj.warning('Aviso:', data.msg);
            }

            $("#agregar-categoria").modal("hide");
            categoriaJS.limpiar_formulario();
        });

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }


});