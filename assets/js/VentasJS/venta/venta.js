
//Globals

var documento_dni = '';
var id_venta_general = $("#txtIdVenta").val();

var data_detalle_esp = '';

var unique_values = [];

var funcionalidades = {

}

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
            data_detalle_esp = data;
            var sub_total = 0;


            unique_values = [];
            let unique_values_next = [];
            let map_detalle = new Map();
            for (const item of data) {
                if(!map_detalle.has(item.id_producto)){
                    map_detalle.set(item.id_producto, true);    // set any value to Map
                    unique_values.push({
                        id: item.id_producto,
                        name: item.nombre_producto
                    });

                }
            }

            $.each(data, function(idx, obj) {
                audiProduct = obj.id_producto;
                html += `<tr>
                    <td><button class="badge badge-pill badge-danger" onClick="eliminar_DetalleVenta(` + obj.id_detalle_venta + `)"> <i class="fas fa-trash fa-xs"></i></button></td>
                    <th>` + obj.cantidad + `</th>
                    <td>` + obj.nombre_producto + `</td>
                    <td>` + obj.precio + `</td>
                    <td>` + obj.sub_total + `</td>
                </tr>`;

                sub_total += parseFloat(obj.sub_total);

            });

            $.each(unique_values, function(idxgen, objgen) {
                unique_values[idxgen]['cantidad'] = 0;
                $.each(data, function(idxesp, objesp) {
                    if (objgen.id.indexOf(objesp.id_producto) != -1 ) {
                        unique_values[idxgen]['cantidad'] += parseFloat(objesp.cantidad);
                    } 

                });

             });
            console.log(unique_values);

            $("#detalle_venta").html(html);
            var total = sub_total - (sub_total * 0.18);
            $("#sub_total").val(total);

            $("#total").val(sub_total);

            if (callback) {
                callback();
            }
        });
    },


    agregar_Venta: function(cliente,  callback) {
        var obj = {header: cliente};

        ventasJS.post('venta/registrarVenta', obj, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
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
    ventaJS.listarDetalleVenta(id_venta_general);

    $('#slccliente').change(function() {
        var selected = $(this).find('option:selected');
        var numero_documento = selected.data('ndocumento');

        var direccion = selected.data('direccion');
        var celular = selected.data('celular');

        $("#documento").val(numero_documento);
        $("#telefono").val(celular);
        $("#direccion").val(direccion);

        documento_dni = $('#documento').val();
    });

    $('#slctproducto').change(function() {

        var data = $(this).select2('data');
        var nombre_producto = data[0].text;

        var selected = $(this).find('option:selected');
        var stock = selected.data('stock');

        $("#stock").val(stock);
    });

    $("#guardar_general").click(function(){

        //USUARIO NEW

        var msj_error = ''; 
        var slccliente = $("#slccliente").val();
        var fecha_pedido = $("#fechapedido").val();
        var fecha_entrega = $("#fechaentrega").val();

        if (slccliente == '') {
            msj_error += 'Selecciona un Cliente. <br>';
        }

        if (fecha_pedido == '') {
            msj_error += 'Ingrese una Fecha de Pêdido. <br>';
        }

        if (fecha_entrega == '') {
            msj_error += 'Ingrese una Fecha de Enetrega. <br>';
        }

        var cliente = {};

        cliente.id_cliente = slccliente;
        cliente.fecha_pedido = fecha_pedido;
        cliente.fecha_entrega = fecha_entrega;

        if (msj_error == '') {

            ventaJS.agregar_Venta(cliente, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    id_venta_general = data.reg_id;
                    $("#txtIdVenta").val(data.reg_id)
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
            });

        } else {
            ventasJS.msj.warning('Aviso:', msj_error);
        }

    })

    $("#agregar-producto").click(function() {

        // if(documento_dni == ''){
        //     return ventasJS.msj.warning('Aviso:', "Seleccione a un cliente");
        // }
        if (id_venta_general == '') {
            return ventasJS.msj.warning('Aviso:', "Seleccione a un cliente");
        }
        // VENTA

        var id_venta = $("#txtIdVenta").val();

        // USUARIO
        var usuario = $("#slccliente").select2('data');
        var id_usuario = usuario[0].id;

        // var fecha_pedido = $("#fecha_pedido").val();
        // var fecha_entrega = $("#fecha_entrega").val();


     

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

        //validate cantidad detalle

        $.each(unique_values, function(idxgen, objgen) {
            if (objgen.id == id_producto) {
                let suma_stock = (objgen.cantidad + parseInt(cantidad));
                if(suma_stock>stock){
                   msj_error += 'Ingrese una cantidad no mayor al stock del producto la suma es '+suma_stock+'. <br>'; 
                }
            }
            

         });



        var productos = {};
        var cliente = {};

        // cliente.id_cliente = id_usuario;
        // cliente.fecha_pedido = fecha_pedido;
        // cliente.fecha_entrega = fecha_entrega;
        productos.id_venta = id_venta;
        productos.id_producto = id_producto;
        // productos.id_cliente = id_usuario;
        productos.cantidad = cantidad;
        productos.precio = precio;

        if (msj_error == '') {
            if (id_venta != '') {

                ventaJS.agregar_DetalleVenta(productos, function(data) {
                    if (data.status == 'success') {
                        ventasJS.msj.success('Aviso:', data.msg);
                        ventaJS.listarDetalleVenta(id_venta);
                        $("#slctproducto").val(null).trigger('change');
                        $("#cantidad").val('');
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

    });

});

function eliminar_DetalleVenta(id) {
    ventaJS.eliminar_DetalleVenta(id, function() {
        ventaJS.listarDetalleVenta(id_venta_general);
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

$('#fechapedido').datepicker({
    autoclose: true
});
$('#fechaentrega').datepicker({
    autoclose: true
});




$("#agregar-cliente").click(function() {
    $("#modal-cliente").modal("show");
    $("#titulo-modal-cliente").html('Registrar cliente');
});


$(".btn-cancelar").click(function() {
    $("#modal-cliente").modal("hide");
    // usuarioJS.limpiar_formulario();
});


//mmodal pedido

$("#realizar-pedido").click(function() {
    $("#modal-pedido").modal("show");
    $(".titulo-modal-cliente").html('<center>Registrar pedido</center>');
});
//


function pago(_tipo){
    var text_l = "";
    var text_label = "";
    if (_tipo == 1) {text_l="¿Pagar Pedido?"} else {text_l="¿Fraccionar Pago?"}
    swal({
            title: text_l,
            text: "No podrá revertir los cambios",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Si",
            cancelButtonText: "No",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm) {
            if (isConfirm) {

                if (_tipo == 1) {text_label=""} else {text_label=" Primer "}

                $('.option').text(text_label);   
                $('.formulario_pago').removeClass('d-none')
                $('.formulario_pago').addClass('d-block')
                $('.opciones').addClass('d-none')
                $('.opciones').removeClass('d-block');
            }
        });
}

$('.regresar').click(function(){
    $('.formulario_pago').addClass('d-none');
    $('.formulario_pago').removeClass('d-block');
    $('.opciones').removeClass('d-none');
    $('.opciones').addClass('d-block');
    $('.c_monto').val("");
})
// Exportar PDF

$("#generarProforma").click(function(){
    $url = "/ventas/content/venta/pdfventa?cli="+id_venta_general;
    window.open($url, "Pedido",'width=702,height=750')

});



