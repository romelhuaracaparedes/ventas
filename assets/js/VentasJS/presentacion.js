var presentacionJS = {

    obtener_presentacion: function(id, callback) {

        $.post('presentacion/obtenerPresentacion', { id: id }, function(data) {
            if (callback) {
                callback(data[0]);
            }
        }, 'json').fail(function(err) {
            if (callback) {
                callback({ err: err, status: '0' });
            }
        });
    },

    agregar_presentacion: function(nombre, flg, callback) {

        var obj = {};
        obj.nombre_presentacion = nombre;
        obj.flg_estado = flg;
        $.post('presentacion/registrarPresentacion', obj, function(data) {
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

    editar_presentacion: function(id, nombre, flg, callback) {
        var obj = {};
        obj.id_presentacion = id;
        obj.nombre_presentacion = nombre;
        obj.flg_estado = flg;

        $.post('presentacion/actualizarPresentacion', obj, function(data) {
            if (callback) {
                callback(data);
            }

        }, 'json').fail(function(err) {
            if (callback) {
                callback({ err: err, status: '0' });
            }
        });
    },

    eliminar_presentacion: function(id, callback) {

        var obj = {};
        obj.id_presentacion = id;
        $.post('presentacion/eliminarPresentacion', obj, function(data) {
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

        $('#id_presentacion').val('');
        $('#nombre_presentacion').val('');
        $('#estado_presentacion').prop('checked', true);
    },

    listarPresentaciones: function() {
        var tblEntidad = $('#tablapresentaciones').DataTable({
            responsive: true,
            retrieve: true,
            ajax: {
                url: 'presentacion/listarPresentaciones',
                type: 'POST',
                dataSrc: ""
            },
            columns: [

                {

                    title: 'N°',
                    data: 'id_presentacion',
                },
                {

                    title: 'NOMBRE DE PRESENTACIÓN',
                    data: 'nombre_presentacion',
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
                            <button class="btn btn-primary btn-sm" onclick="getPresentacionById(` + row.id_presentacion + `)"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminarPresentacion(` + row.id_presentacion + `)"><i class="fas fa-trash" ></i></button>
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

$(document).ready(function() {
    presentacionJS.listarPresentaciones();
});


$("#btn-cancelar").click(function() {
    $("#modal-presentacion").modal("hide");
    presentacionJS.limpiar_formulario();
});

$("#btn-guardar").click(function() {

    var id_presentacion = $.trim($('#id_presentacion').val());
    var nombre = $.trim($('#nombre_presentacion').val());
    var estado = ($('#estado_presentacion').is(":checked")) ? 1 : 0;

    var msj_error = '';
    if (nombre == '') {
        msj_error += 'Ingresar Nombre de Presentación <br>';
    }
    if (msj_error == '') {

        if (id_presentacion == '') {
            presentacionJS.agregar_presentacion(nombre, estado, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablapresentaciones').DataTable().destroy();

                    presentacionJS.listarPresentaciones();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-presentacion").modal("hide");
                presentacionJS.limpiar_formulario();
            });
        } else {
            presentacionJS.editar_presentacion(id_presentacion, nombre, estado, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablapresentaciones').DataTable().destroy();

                    presentacionJS.listarPresentaciones();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-presentacion").modal("hide");
                presentacionJS.limpiar_formulario();
            });
        }

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }
});

$("#agregar-presentacion").click(function() {
    $("#modal-presentacion").modal("show");
    $("#titulo_modal").html('Registro de Presentación');
});



function getPresentacionById(id) {
    presentacionJS.obtener_presentacion(id, function(data) {

        $("#modal-presentacion").modal("show");
        $("#titulo_modal").html('Editar de Presentación');
        $('#id_presentacion').val(data.id_presentacion);
        $('#nombre_presentacion').val(data.nombre_presentacion);

        if (data.flg_estado == '1') {
            $('#estado_presentacion').prop('checked', true);
        } else {
            $('#estado_presentacion').prop('checked', false);
        }

    });

}

function eliminarPresentacion(id) {

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
                presentacionJS.eliminar_presentacion(id, function(data) {
                    if (data.status == 'success') {
                        ventasJS.msj.success('Aviso:', data.msg);
                        $('#tablapresentaciones').DataTable().destroy();
                        presentacionJS.listarPresentaciones();
                    } else {
                        ventasJS.msj.warning('Aviso:', data.msg);
                    }
                });
            }
        });
}