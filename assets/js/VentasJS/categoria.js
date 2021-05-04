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

            // if


            // console.log(data);
            if (callback) {
                callback({ resp: 'ok', status: '1' });
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

    }

};