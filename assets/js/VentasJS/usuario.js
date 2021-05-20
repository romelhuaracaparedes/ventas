var usuarioJS = {

    obtener_tipo_usuario: function(id, callback) {

        ventasJS.post('../usuario/obtenerTipoUsuario', { id: id }, function(data) {
            if (callback) {
                callback(data[0]);
            }
        });
    },



    agregar_tipo_usuario: function(id, nombre, flg, callback) {


        var obj = {};
        obj.id_tipo_usuario = id;
        obj.nombre_tipo_usuario = nombre;
        obj.flg_estado = flg;

        ventasJS.post('../usuario/registrarTipoUsuario', obj, function(data) {
            if (callback) {
                callback(data);
            }
        });
    },

    eliminar_tipo_usuario: function(id, callback) {

        var obj = {};
        obj.id_tipo_usuario = id;
        ventasJS.post('../usuario/eliminarTipoUsuario', obj, function(data) {
            if (callback) {
                callback(data);
            }
        });
    },

    limpiar_formulario: function() {

        $('#id_tipo_usuario').val('');
        $('#tipo_usuario').val('');
        $('#estado_tipo_usuario').prop('checked', true);
    },

    listarTiposUsuario: function() {
        var tblEntidad = $('#tablatipousuarios').DataTable({
            responsive: true,
            retrieve: true,
            ajax: {
                url: '../usuario/listarTiposUsuario',
                type: 'POST',
                data: { csrf_patbin_tkn: ventasJS.tk_v },
                dataSrc: ""
            },
            columns: [

                {

                    title: 'N°',
                    data: 'id_tipo_usuario',
                },
                {

                    title: 'TIPO DE USUARIO',
                    data: 'tipo_usuario',
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
                            <button class="btn btn-primary btn-sm" onclick="getTipoUsuarioById(` + row.id_tipo_usuario + `)"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminarTipoUsuario(` + row.id_tipo_usuario + `)"><i class="fas fa-trash" ></i></button>
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
    },

    listarUsuarios: function() {
        var tblEntidad = $('#tablausuarios').DataTable({
            responsive: true,
            retrieve: true,
            ajax: {
                url: 'usuario/listarUsuarios',
                type: 'POST',
                data: { csrf_patbin_tkn: ventasJS.tk_v },
                dataSrc: ""
            },
            columns: [


                {

                    title: 'DOCUMENTO',
                    data: 'numero_documento',
                },
                {

                    title: 'USUARIO',
                    data: 'usuario',
                },
                {

                    title: 'TELÉFONO',
                    data: 'telefono',
                },
                {

                    title: 'TIPO USUARIO',
                    data: 'tipo_usuario',
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
                            <button class="btn btn-primary btn-sm" onclick="getUsuarioById(` + row.id_usuario + `)"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminarUsuario(` + row.id_usuario + `)"><i class="fas fa-trash" ></i></button>
                            `;

                    },

                },
                {
                    targets: 4,
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
    },

    agregar_usuario: function(obj, callback) {

        ventasJS.post('usuario/registrarUsuario', obj, function(data) {
            if (callback) {
                callback(data);
            }

        });
    },




};

$(document).ready(function() {
    usuarioJS.listarTiposUsuario();
    usuarioJS.listarUsuarios();
});


function listarTiposUsuarios(select, selected, callback) {
    ventasJS.post('usuario/listarTiposUsuario', {}, function(data) {
        $(select).html('<option value="">-- Seleccione --</option>');
        $.each(data, function(index, obj) {
            var seleccionado = "";
            if (selected) {
                if (selected == obj.id_tipo_usuario) {
                    seleccionado = "selected";
                }
            }
            $(select).append('<option value="' + obj.id_tipo_usuario + '" ' + seleccionado + '>' + obj.tipo_usuario + '</option>');
        });
        if (callback) {
            callback();
        }
    });
};




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


$("#agregar-tipo-usuario").click(function() {
    $("#modal-tipo-usuario").modal("show");
    $("#titulo_modal").html('Registrar tipo de usuario');
});


$("#agregar-usuario").click(function() {
    $("#modal-usuario").modal("show");
    $("#titulo_modal-usuario").html('Registrar usuario');
    listarTiposUsuarios("#tipo_usuario");
});


$(".btn-cancelar").click(function() {
    $("#modal-tipo-usuario").modal("hide");
    usuarioJS.limpiar_formulario();
});

$(".btn-cancelar-usuario").click(function() {
    $("#modal-usuario").modal("hide");

});


$("#guardar-tipo-usuario").click(function() {

    var id_tipo_usuario = $.trim($('#id_tipo_usuario').val());
    var nombre = $.trim($('#tipo_usuario').val());
    var estado = ($('#estado_tipo_usuario').is(":checked")) ? 1 : 0;
    var msj_error = '';
    if (nombre == '') {
        msj_error += 'Ingresar Nombre de Categoría <br>';
    }
    if (msj_error == '') {

        usuarioJS.agregar_tipo_usuario(id_tipo_usuario, nombre, estado, function(data) {
            if (data.status == 'success') {
                ventasJS.msj.success('Aviso:', data.msg);
                $('#tablatipousuarios').DataTable().destroy();

                usuarioJS.listarTiposUsuario();
            } else {
                ventasJS.msj.warning('Aviso:', data.msg);
            }
            $("#modal-tipo-usuario").modal("hide");
            usuarioJS.limpiar_formulario();
        });

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }
});





$("#guardar-usuario").click(function() {

    var obj = {};
    obj.id_usuario = $.trim($('#id_usuario').val());
    obj.nombres = $.trim($('#nombres').val());
    obj.apellido_paterno = $('#apellido_paterno').val();
    obj.apellido_materno = $('#apellido_materno').val();
    obj.correo = $.trim($('#correo').val());
    obj.celular = $.trim($('#celular').val());
    obj.tipo_documento = $('#tipo_documento').val();
    obj.num_documento = $.trim($('#num_documento').val());
    obj.tipo_usuario = $.trim($('#tipo_usuario').val());
    obj.estado = ($('#estado_usuario').is(":checked")) ? 1 : 0;
    obj.csrf_patbin_tkn = $("#token").val();


    var form = $('#form-usuario');
    var formulario = form.validate({
        errorElement: 'div',
        rules: {
            nombres: {
                required: true
            },
            apellio_paterno: {
                required: true
            },
            apellido_materno: {
                required: true
            },
            correo: {
                required: true,
                email: true
            },
            celular: {
                required: true,
                number: true,
                maxlength: 10,
                minlength: 5
            },
            tipo_documento: {
                required: true
            },
            num_documento: {
                required: true
            },
            tipo_usuario: {
                required: true
            },
            estado: {
                required: true
            }
        }

    });

    if (!formulario.form()) {
        return;
    } else {

        usuarioJS.agregar_usuario(obj, function(data) {
            if (data.status == 'success') {
                ventasJS.msj.success('Aviso:', data.msg);

                $('#tablausuarios').DataTable().destroy();
                usuarioJS.listarUsuarios();
            } else {
                ventasJS.msj.warning('Aviso:', data.msg);
            }
            $("#modal-usuario").modal("hide");
            usuarioJS.limpiar_formulario();
        });
    }


});



function getTipoUsuarioById(id) {
    usuarioJS.obtener_tipo_usuario(id, function(data) {

        $("#modal-tipo-usuario").modal("show");
        $("#titulo_modal").html('Editar tipo de usuario');

        console.log(data);
        $('#id_tipo_usuario').val(data.id_tipo_usuario);
        $('#tipo_usuario').val(data.tipo_usuario);

        if (data.flg_estado == '1') {
            $('#estado_tipo_usuario').prop('checked', true);
        } else {
            $('#estado_tipo_usuario').prop('checked', false);
        }

    });

}


function eliminarTipoUsuario(id) {

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
                usuarioJS.eliminar_tipo_usuario(id, function(data) {
                    if (data.status == 'success') {
                        ventasJS.msj.success('Aviso:', data.msg);
                        $('#tablatipousuarios').DataTable().destroy();
                        usuarioJS.listarTiposUsuario();
                    } else {
                        ventasJS.msj.warning('Aviso:', data.msg);
                    }
                });
            }
        });
}