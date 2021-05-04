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

// $('#tablacategorias').DataTable({
//     responsive: true,

// });

$(document).ready(function() {


    var tblEntidad = $('#tablacategorias').DataTable({
        responsive: true,

        ajax: {
            url: 'categoria/listarCategorias',
            type: 'POST',
            dataSrc: ""
        },
        columns: [

            {

                title: 'N°',
                data: 'id_categoria',
            },
            {

                title: 'NOMBRE DE CATEGORIA',
                data: 'nombre_categoria',
            },

            {

                title: 'ESTADO',
                data: 'flg_estado',
            },
            {
                title: 'OPCIONES',
                responsivePriority: -1,

            },
        ],
        columnDefs: [

            {
                targets: -1,
                title: 'OPCIONES',
                orderable: false,
                render: function(value, type, row) {
                    return `
                            <button class="btn btn-primary btn-sm"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash" ></i></button>
                            `;
                },
            },
            {
                targets: 2,
                render: function(data) {
                    var estado = {
                        0: { 'title': 'Inactivo', 'class': 'badge-primary-light' },
                        1: { 'title': 'Activo', 'class': 'badge-warning-light' },

                    };
                    if (typeof estado[data] === 'undefined') {
                        return data;
                    }

                    return '<span class="badge badge-pill ' + estado[data].class + ' ">' + estado[data].title + '</span>';
                },
            },

        ]
    });
});


// <
// td > < span class = "badge badge-pill badge-primary-light" > Activo < /span></td >
//     <
//     td >
//     <
//     button class = "btn btn-primary btn-sm" > < i class = "fas fa-edit" > < /i></button >
//     <
//     button class = "btn btn-danger btn-sm" > < i class = "fas fa-trash" > < /i></button >
//     <
//     /td> <
//     /tr> <
//     tr style = "text-align: center;" >
//     <
//     td > 2 < /td> <
//     td > Categoría 2 < /td> <
//     td >
//     <
//     span class = "badge badge-pill badge-warning-light" > Inactivo < /span>