var usuarioJS = {


    // listarUsuarios: function() {
    //     var tblEntidad = $('#tablausuarios').DataTable({
    //         responsive: true,
    //         retrieve: true,
    //         ajax: {
    //             url: 'usuario/listarUsuarios',
    //             type: 'POST',
    //             data: { csrf_patbin_tkn: ventasJS.tk_v },
    //             dataSrc: ""
    //         },
    //         columns: [


    //             {

    //                 title: 'DOCUMENTO',
    //                 data: 'numero_documento',
    //             },
    //             {

    //                 title: 'USUARIO',
    //                 data: 'usuario',
    //             },
    //             {

    //                 title: 'TELÉFONO',
    //                 data: 'telefono',
    //             },
    //             {

    //                 title: 'TIPO USUARIO',
    //                 data: 'tipo_usuario',
    //             },

    //             {

    //                 title: 'ESTADO',
    //                 data: 'flg_estado',
    //             },
    //             {
    //                 title: 'OPCIONES',
    //                 responsivePriority: -1,

    //             },
    //         ],
    //         columnDefs: [

    //             {
    //                 targets: -1,
    //                 title: 'OPCIONES',
    //                 orderable: false,
    //                 render: function(value, type, row) {
    //                     return `
    //                         <button class="btn btn-primary btn-sm" onclick="getUsuarioById(` + row.id_usuario + `)"><i class="fas fa-edit" ></i></button>
    //                         <button class="btn btn-danger btn-sm" onclick="eliminarUsuario(` + row.id_usuario + `)"><i class="fas fa-trash" ></i></button>
    //                         `;

    //                 },

    //             },
    //             {
    //                 targets: 4,
    //                 render: function(data) {
    //                     var estado = {
    //                         0: { 'title': 'Inactivo', 'class': 'badge-primary-light' },
    //                         1: { 'title': 'Activo', 'class': 'badge-warning-light' },

    //                     };
    //                     if (typeof estado[data] === 'undefined') {
    //                         return data;
    //                     }

    //                     return '<span class="badge badge-pill ' + estado[data].class + ' ">' + estado[data].title + '</span>';
    //                 },
    //             },

    //         ]
    //     });
    // },

    // agregar_usuario: function(obj, callback) {

    //     ventasJS.post('usuario/registrarUsuario', obj, function(data) {
    //         if (callback) {
    //             callback(data);
    //         }

    //     });
    // },

    listarClientes: function(callback) {

        ventasJS.post('cliente/listarClientes', {}, function(data) {
            var clientes = [];
            $.each(data, function(index, obj) {
                clientes.push(obj.nombres);
            });

            $("#clientes").autocomplete({
                source: clientes
            });
            if (callback) {
                callback();
            }
        });

    },
    listarProductos: function(callback) {

        ventasJS.post('producto/listarProductos', {}, function(data) {
            var productos = [];
            $.each(data, function(index, obj) {
                productos.push(obj.nombre_producto);
            });

            $("#productos").autocomplete({
                source: productos
            });
            if (callback) {
                callback();
            }
        });

    },






};

$(document).ready(function() {
    usuarioJS.listarClientes();
    usuarioJS.listarProductos();
});


var availableTags = [
    "ActionScript",
    "AppleScript",
    "Asp",
    "BASIC",
    "C",
    "C++",
    "Clojure",
    "COBOL",
    "ColdFusion",
    "Erlang",
    "Fortran",
    "Groovy",
    "Haskell",
    "Java",
    "JavaScript",
    "Lisp",
    "Perl",
    "PHP",
    "Python",
    "Ruby",
    "Scala",
    "Scheme"
];




$("#agregar-cliente").click(function() {
    $("#modal-cliente").modal("show");
    $("#titulo-modal-cliente").html('Registrar cliente');
});


$(".btn-cancelar").click(function() {
    $("#modal-cliente").modal("hide");
    // usuarioJS.limpiar_formulario();
});


// $("#guardar-usuario").click(function() {

//     var obj = {};
//     obj.id_usuario = $.trim($('#id_usuario').val());
//     obj.nombres = $.trim($('#nombres').val());
//     obj.apellido_paterno = $('#apellido_paterno').val();
//     obj.apellido_materno = $('#apellido_materno').val();
//     obj.correo = $.trim($('#correo').val());
//     obj.celular = $.trim($('#celular').val());
//     obj.tipo_documento = $('#tipo_documento').val();
//     obj.num_documento = $.trim($('#num_documento').val());
//     obj.tipo_usuario = $.trim($('#tipo_usuario').val());
//     obj.estado = ($('#estado_usuario').is(":checked")) ? 1 : 0;
//     obj.csrf_patbin_tkn = $("#token").val();


//     var form = $('#form-usuario');
//     var formulario = form.validate({
//         errorElement: 'div',
//         rules: {
//             nombres: {
//                 required: true
//             },
//             apellio_paterno: {
//                 required: true
//             },
//             apellido_materno: {
//                 required: true
//             },
//             correo: {
//                 required: true,
//                 email: true
//             },
//             celular: {
//                 required: true,
//                 number: true,
//                 maxlength: 10,
//                 minlength: 5
//             },
//             tipo_documento: {
//                 required: true
//             },
//             num_documento: {
//                 required: true
//             },
//             tipo_usuario: {
//                 required: true
//             },
//             estado: {
//                 required: true
//             }
//         }

//     });

//     if (!formulario.form()) {
//         return;
//     } else {

//         usuarioJS.agregar_usuario(obj, function(data) {
//             if (data.status == 'success') {
//                 ventasJS.msj.success('Aviso:', data.msg);

//                 $('#tablausuarios').DataTable().destroy();
//                 usuarioJS.listarUsuarios();
//             } else {
//                 ventasJS.msj.warning('Aviso:', data.msg);
//             }
//             $("#modal-usuario").modal("hide");
//             usuarioJS.limpiar_formulario();
//         });
//     }


// });



// function eliminarTipoUsuario(id) {

//     swal({
//             title: "¿Está seguro de Eliminar?",
//             text: "No podrá revertir los cambios",
//             type: "warning",
//             showCancelButton: true,
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "Si, Eliminar",
//             cancelButtonText: "No, cancelar",
//             closeOnConfirm: true,
//             closeOnCancel: true
//         },
//         function(isConfirm) {
//             if (isConfirm) {
//                 usuarioJS.eliminar_tipo_usuario(id, function(data) {
//                     if (data.status == 'success') {
//                         ventasJS.msj.success('Aviso:', data.msg);
//                         $('#tablatipousuarios').DataTable().destroy();
//                         usuarioJS.listarTiposUsuario();
//                     } else {
//                         ventasJS.msj.warning('Aviso:', data.msg);
//                     }
//                 });
//             }
//         });
// }