var categoriaJS = {

    obtener_categoria: function(id, callback) {

        ventasJS.post('categoria/obtenerCategoria', { id: id }, function(data) {
            if (callback) {
                callback(data[0]);
            }
        });
    },



    agregar_categoria: function(nombre, flg, callback) {

        var obj = {};
        obj.nombre_caterogia = nombre;
        obj.flg_estado = flg;

        ventasJS.post('categoria/registrarCategoria', obj, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }
        });
    },

    editar_categoria: function(id, nombre, flg, callback) {
        var obj = {};
        obj.id_categoria = id;
        obj.nombre_caterogia = nombre;
        obj.flg_estado = flg;

        ventasJS.post('categoria/actualizarCategoria', obj, function(data) {
            if (callback) {
                callback(data);
            }

        });
    },

    eliminar_categoria: function(id, callback) {

        var obj = {};
        obj.id_categoria = id;
        ventasJS.post('categoria/eliminarCategoria', obj, function(data) {
            if (callback) {
                callback(data);
            }
        });
    },

    limpiar_formulario: function() {

        $('#id_categoria').val('');
        $('#nombre_categoria').val('');
        $('#estado_categoria').prop('checked', true);
    },

    listarCategorias: function() {
        var tblEntidad = $('#tablacategorias').DataTable({
            responsive: true,
            retrieve: true,
            ajax: {
                url: 'categoria/listarCategorias',
                type: 'POST',
                data: { csrf_patbin_tkn: ventasJS.tk_v },
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
                            <button class="btn btn-primary btn-sm" onclick="getCategoriaById(` + row.id_categoria + `)"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminarCategoria(` + row.id_categoria + `)"><i class="fas fa-trash" ></i></button>
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
    }


};

// $('#tablacategorias').DataTable({
//     responsive: true,

// });

$(document).ready(function() {
    categoriaJS.listarCategorias();
});


$("#btn-cancelar").click(function() {
    $("#modal-categoria").modal("hide");
    categoriaJS.limpiar_formulario();
});

$("#btn-guardar").click(function() {

    var id_categoria = $.trim($('#id_categoria').val());
    var nombre = $.trim($('#nombre_categoria').val());
    var estado = ($('#estado_categoria').is(":checked")) ? 1 : 0;
    var msj_error = '';
    if (nombre == '') {
        msj_error += 'Ingresar Nombre de Categoría <br>';
    }
    if (msj_error == '') {

        if (id_categoria == '') {
            categoriaJS.agregar_categoria(nombre, estado, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablacategorias').DataTable().destroy();

                    categoriaJS.listarCategorias();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-categoria").modal("hide");
                categoriaJS.limpiar_formulario();
            });
        } else {
            categoriaJS.editar_categoria(id_categoria, nombre, estado, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablacategorias').DataTable().destroy();

                    categoriaJS.listarCategorias();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-categoria").modal("hide");
                categoriaJS.limpiar_formulario();
            });
        }

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }
});

$("#agregar-categoria").click(function() {
    $("#modal-categoria").modal("show");
    $("#titulo_modal").html('Registro de Categoría');
});



function getCategoriaById(id) {
    categoriaJS.obtener_categoria(id, function(data) {

        $("#modal-categoria").modal("show");
        $("#titulo_modal").html('Editar de Categoría');


        $('#id_categoria').val(data.id_categoria);
        $('#nombre_categoria').val(data.nombre_categoria);

        if (data.flg_estado == '1') {
            $('#estado_categoria').prop('checked', true);
        } else {
            $('#estado_categoria').prop('checked', false);
        }

    });

}

function eliminarCategoria(id) {

    swal({
            title: "¿Está seguro de Eliminar?",
            text: "No podrá revertir los cambios",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "No, cancelar",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {
                categoriaJS.eliminar_categoria(id, function(data) {
                    if (data.status == 'success') {
                        ventasJS.msj.success('Aviso:', data.msg);
                        $('#tablacategorias').DataTable().destroy();
                        categoriaJS.listarCategorias();
                    } else {
                        ventasJS.msj.warning('Aviso:', data.msg);
                    }
                });
            }
        });
}