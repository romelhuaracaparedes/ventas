var ventaJS = {


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
    llenarCampos: function(data) {

        console.log(data);
    },

    listarDetalleVenta: function(id, callback) {
        ventasJS.post('venta/obtenerDetalleVenta', { id: id }, function(data) {

            var html = ``;

            var sub_total = 0;

            $.each(data, function(idx, obj) {
                html += `<tr>
                    <th>` + obj.cantidad + `</th>
                    <td>` + obj.nombre_producto + `</td>
                    <td>` + obj.precio + `</td>
                    <td>` + obj.sub_total + `</td>
                    <td> <button class="btn btn-danger btn-sm" onClick="eliminar_DetalleVenta(` + obj.id_detalle_venta + `)"> <i class="fas fa-trash"></i></button></td>
                </tr>`;

                sub_total += parseFloat(obj.sub_total);
            });


            console.log(sub_total);

            $("#detalle_venta").html(html);
            $("#sub_total").val(sub_total);

            var total = sub_total + (sub_total * 0.18);
            $("#total").val(total);

            if (callback) {
                callback();
            }
        });
    },

    agregar_DetalleVenta: function(productos, callback) {

        ventasJS.post('venta/registrarDetalleVenta', productos, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },

    eliminar_DetalleVenta: function(id, callback) {
        ventasJS.post('venta/eliminarDetalleVenta', { id: id }, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    }

};

$(document).ready(function() {
    ventaJS.listarClientes();
    ventaJS.listarProductos();

    ventaJS.listarDetalleVenta(1);

    $('#slccliente').change(function() {
        var selected = $(this).find('option:selected');
        var numero_documento = selected.data('ndocumento');

        var direccion = selected.data('direccion');
        var celular = selected.data('celular');

        $("#documento").val(numero_documento);
        $("#telefono").val(celular);
        $("#direccion").val(direccion);
    });

    $('#slctproducto').change(function() {

        var data = $(this).select2('data');
        var nombre_producto = data[0].text;

        var selected = $(this).find('option:selected');
        var stock = selected.data('stock');

        $("#stock").val(stock);
    });

    $("#agregar-producto").click(function() {



        // VENTA

        var id_venta = $("#txtIdVenta").val();

        // USUARIO
        var usuario = $("#slccliente").select2('data');
        var id_usuario = usuario[0].id;

        var fecha_pedido = $("#fecha_pedido").val();
        var fecha_entrega = $("#fecha_entrega").val();



        // PRODUCTOS


        var data = $("#slctproducto").select2('data');
        var nombre_producto = data[0].text;
        var id_producto = data[0].id;

        var producto = $("#slctproducto").find('option:selected');
        var precio = producto.data('preciounit');

        var stock = parseInt($("#stock").val());

        var cantidad = parseInt($("#cantidad").val());
        var msj_error = '';




        if (nombre_producto == '') {
            msj_error += 'Selecciona un Producto. <br>';
        }

        if (cantidad == '') {
            msj_error += 'Ingrese una cantidad. <br>';
        }

        if (cantidad > stock) {
            msj_error += 'Ingrese una cantidad no mayor al stock del producto. <br>';
        }

        var productos = {};
        productos.id_venta = 1;
        productos.id_producto = id_producto;
        // productos.id_cliente = id_usuario;
        productos.cantidad = cantidad;
        productos.precio = precio;

        if (msj_error == '') {
            if (id_venta == '') {
                ventaJS.agregar_DetalleVenta(productos, function(data) {
                    if (data.status == 'success') {
                        ventasJS.msj.success('Aviso:', data.msg);
                        ventaJS.listarDetalleVenta(1);
                    } else {
                        ventasJS.msj.warning('Aviso:', data.msg);
                    }
                    // ventaJS.limpiar_formulario();
                });
            } else {
                // productoJS.editar_producto(obj, function(data) {
                //     if (data.status == 'success') {
                //         ventasJS.msj.success('Aviso:', data.msg);
                //         $('#tablaproductos').DataTable().destroy();

                //         productoJS.listarProductos();
                //     } else {
                //         ventasJS.msj.warning('Aviso:', data.msg);
                //     }
                //     $("#modal-producto").modal("hide");
                //     productoJS.limpiar_formulario();
                // });
            }
        } else {
            ventasJS.msj.warning('Aviso:', msj_error);
        }

        var obj = {};

        // obj.id_cliente = id_usuario;
        // obj.id_vendedor = 1;
        // obj.total = total;
        // obj.tipo_estado = 1;
        // obj.fecha_registro = total;
        // obj.fecha_pedido = total;
        // obj.fecha_entrega = total;
        // obj.id_usuario_registro = total;
        // obj.tipo_comprobante = total;

        // $("#txtIdVenta").val();






    });

    // $('.fc-datepicker').datepicker({
    //     dateFormat: "mm/dd/yy",
    //     showOtherMonths: true,
    //     selectOtherMonths: true,
    //     autoclose: true,
    //     changeMonth: true,
    //     changeYear: true,
    //     orientation: "auto",
    // });

});

function eliminar_DetalleVenta(id) {
    ventaJS.eliminar_DetalleVenta(id, function() {
        ventaJS.listarDetalleVenta(1);
    });
}

$('#slctproducto').select2({
    language: {
        noResults: () => "No se encontraron resultados"
    },
    placeholder: "Digita el nombre del producto"
});


$('#slccliente').select2({
    language: {
        noResults: () => "No se encontraron resultados"
    },
    placeholder: "Digita el nombre del cliente"
});




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