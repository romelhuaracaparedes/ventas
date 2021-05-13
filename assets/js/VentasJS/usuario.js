var usuarioJS = {

    obtener_tipo_usuario: function(id, callback) {

        ventasJS.post('../../usuario/obtenerTipoUsuario', { id: id }, function(data) {
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

        ventasJS.post('../../usuario/registrarTipoUsuario', obj, function(data) {
            if (callback) {
                callback(data);
            }
        });
    },

    // editar_categoria: function(id, nombre, flg, callback) {
    //     var obj = {};
    //     obj.id_categoria = id;
    //     obj.nombre_caterogia = nombre;
    //     obj.flg_estado = flg;

    //     ventasJS.post('categoria/actualizarCategoria', obj, function(data) {
    //         if (callback) {
    //             callback(data);
    //         }

    //     });
    // },

    // eliminar_categoria: function(id, callback) {

    //     var obj = {};
    //     obj.id_categoria = id;
    //     ventasJS.post('categoria/eliminarCategoria', obj, function(data) {
    //         if (callback) {
    //             callback(data);
    //         }
    //     });
    // },

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
                url: '../../usuario/listarTiposUsuario',
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
    }


};

$(document).ready(function() {
    usuarioJS.listarTiposUsuario();
});







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
$(".btn-cancelar").click(function() {
    $("#modal-tipo-usuario").modal("hide");
    usuarioJS.limpiar_formulario();
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
            categoriaJS.limpiar_formulario();
        });

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
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