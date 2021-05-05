var marcaJS = {

    obtener_marca: function(id, callback) {

        $.post('marca/obtenerMarca', { id: id }, function(data) {
            if (callback) {
                callback(data[0]);
            }
        }, 'json').fail(function(err) {
            if (callback) {
                callback({ err: err, status: '0' });
            }
        });
    },

    agregar_marca: function(nombre, flg, callback) {

        var obj = {};
        obj.nombre_marca = nombre;
        obj.flg_estado = flg;
        $.post('marca/registrarMarca', obj, function(data) {
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

    editar_marca: function(id, nombre, flg, callback) {
        var obj = {};
        obj.id_marca = id;
        obj.nombre_marca = nombre;
        obj.flg_estado = flg;

        $.post('marca/actualizarMarca', obj, function(data) {
            if (callback) {
                callback(data);
            }

        }, 'json').fail(function(err) {
            if (callback) {
                callback({ err: err, status: '0' });
            }
        });
    },

    eliminar_marca: function(id, callback) {

        var obj = {};
        obj.id_marca = id;
        $.post('marca/eliminarMarca', obj, function(data) {
            if (callback) {
                callback(data);
            }

        }, 'json').fail(function(err) {
            if (callback) {
                callback({ err: err, status: '0' });
            }
        });
    },

    limpiar_formulario: function() {

        $('#id_marca').val('');
        $('#nombre_marca').val('');
        $('#estado_marca').prop('checked', true);
    },

    listarMarcas: function() {
        var tblEntidad = $('#tablamarcas').DataTable({
            responsive: true,
            retrieve: true,
            ajax: {
                url: 'marca/listarMarcas',
                type: 'POST',
                dataSrc: ""
            },
            columns: [

                {

                    title: 'N°',
                    data: 'id_marca',
                },
                {

                    title: 'NOMBRE DE MARCA',
                    data: 'nombre_marca',
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
                            <button class="btn btn-primary btn-sm" onclick="getMarcaById(` + row.id_marca + `)"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminarMarca(` + row.id_marca + `)"><i class="fas fa-trash" ></i></button>
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

// $('#tablamarcas').DataTable({
//     responsive: true,

// });

$(document).ready(function() {
    marcaJS.listarMarcas();
});


$("#btn-cancelar").click(function() {
    $("#modal-marca").modal("hide");
    marcaJS.limpiar_formulario();
});

$("#btn-guardar").click(function() {

    var id_marca = $.trim($('#id_marca').val());
    var nombre = $.trim($('#nombre_marca').val());
    var estado = ($('#estado_marca').is(":checked")) ? 1 : 0;
    var msj_error = '';
    if (nombre == '') {
        msj_error += 'Ingresar Nombre de Marca <br>';
    }
    if (msj_error == '') {

        if (id_marca == '') {
            marcaJS.agregar_marca(nombre, estado, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablamarcas').DataTable().destroy();

                    marcaJS.listarMarcas();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-marca").modal("hide");
                marcaJS.limpiar_formulario();
            });
        } else {
            marcaJS.editar_marca(id_marca, nombre, estado, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablamarcas').DataTable().destroy();

                    marcaJS.listarMarcas();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-marca").modal("hide");
                marcaJS.limpiar_formulario();
            });
        }

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }
});

$("#agregar-marca").click(function() {
    $("#modal-marca").modal("show");
    $("#titulo_modal").html('Registro de Marca');
});



function getMarcaById(id) {
    marcaJS.obtener_marca(id, function(data) {

        $("#modal-marca").modal("show");
        $("#titulo_modal").html('Editar de Marca');


        $('#id_marca').val(data.id_marca);
        $('#nombre_marca').val(data.nombre_marca);

        if (data.flg_estado == '1') {
            $('#estado_marca').prop('checked', true);
        } else {
            $('#estado_marca').prop('checked', false);
        }

    });

}

function eliminarMarca(id) {

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
                marcaJS.eliminar_marca(id, function(data) {
                    if (data.status == 'success') {
                        ventasJS.msj.success('Aviso:', data.msg);
                        $('#tablamarcas').DataTable().destroy();
                        marcaJS.listarMarcas();
                    } else {
                        ventasJS.msj.warning('Aviso:', data.msg);
                    }
                });
            }
        });
}