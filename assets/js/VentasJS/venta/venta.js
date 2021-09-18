//Globals

var documento_dni = '';
var id_venta_general = $("#txtIdVenta").val();

var data_detalle_esp = '';

var unique_values = [];

var detalle_venta = {};

var carrito = {};

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
                if (!map_detalle.has(item.id_producto)) {
                    map_detalle.set(item.id_producto, true); // set any value to Map
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
                    if (objgen.id.indexOf(objesp.id_producto) != -1) {
                        unique_values[idxgen]['cantidad'] += parseFloat(objesp.cantidad);
                    }

                });

            });
            console.log(unique_values);

            $("#detalle_venta").html(html);
            var total = (sub_total / 1.18).toFixed(2);
            $("#sub_total").val(total);
            $("#igv_total").val((total * 0.18).toFixed(2));

            $("#total").val(sub_total);

            if (callback) {
                callback();
            }
        });
    },


    agregar_Venta: function(cliente, callback) {
        var obj = { header: cliente };

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


    agregar_pago: function(dataGen, callback) {
        console.log(dataGen);
        ventasJS.post('venta/agregarPago', dataGen, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },

    eliminar_DetalleVenta: function(id, callback) {
        ventasJS.post('venta/eliminarDetalleVenta', { id: id, id_venta: id_venta_general }, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },

    agregar_cliente: function(obj, callback) {

        ventasJS.post('cliente/registarCliente', obj, function(data) {
            console.log(data);
            if (callback) {
                callback(data);
            }
        });
    },

    listar_cliente: function() {

        ventasJS.post('cliente/listarClientes', {}, function(data) {
            $("#slccliente").html('<option value="0">-- Seleccione --</option>');
            $.each(data, function(index, obj) {
                $("#slccliente").append('<option value="' + obj.id_cliente + '" data-ndocumento="' + obj.numero_documento + '" data-direccion="' + obj.direccion + '" data-celular="' + obj.celular + '" >' + obj.nombres + '</option>');
            });

        });
    }

};


$(document).ready(function() {
    ventaJS.listarClientes();
    ventaJS.listarProductos();
    ventaJS.listarDetalleVenta(id_venta_general);

    const templateCarrito = document.getElementById('template-carrito').content;
    const items = document.getElementById('items');
    const fragment = document.createDocumentFragment();

    items.addEventListener('click', function(e) {
        eliminar(e);
    });



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

    $("#guardar_general").click(function() {

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

        // PRODUCTOS

        var data = $("#slctproducto").select2('data');
        var nombre_producto = data[0].text;
        var id_producto = data[0].id;

        var producto = $("#slctproducto").find('option:selected');
        var precio = producto.data('preciounit');
        var stock = parseInt($("#stock").val());
        var cantidad = ($("#cantidad").val());

        var msj_error = '';

        if (nombre_producto == '') {
            msj_error += 'Selecciona un Producto. <br>';
        }

        if (precio == '') {
            msj_error += 'El producto no cuenta con precio. <br>';
        }

        if (cantidad == '' || cantidad == 0) {
            msj_error += 'Ingrese una cantidad mayor a 0. <br>';
        }

        if (cantidad > stock) {
            msj_error += 'Ingrese una cantidad no mayor al stock del producto. <br>';
        }



        // productos.id_venta = id_venta;
        producto.id_producto = id_producto;
        producto.nombre_producto = nombre_producto;
        producto.cantidad = parseInt(cantidad);
        producto.precio = parseFloat(precio);


        if (carrito.hasOwnProperty(producto.id_producto)) {
            producto.cantidad = carrito[producto.id_producto].cantidad + producto.cantidad;
        }

        if (producto.cantidad < stock) {
            carrito[producto.id_producto] = {...producto };

            items.innerHTML = ''

            Object.values(carrito).forEach(producto => {
                templateCarrito.querySelector('.badge-pill').dataset.id = producto.id_producto;
                templateCarrito.querySelector('.fa-trash').dataset.id = producto.id_producto;
                templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad;
                templateCarrito.querySelectorAll('td')[2].textContent = producto.nombre_producto;
                templateCarrito.querySelectorAll('td')[3].textContent = producto.precio;
                templateCarrito.querySelector('span').textContent = producto.precio * producto.cantidad;

                // //botones
                // templateCarrito.querySelector('.btn-info').dataset.id = producto.id
                // templateCarrito.querySelector('.btn-danger').dataset.id = producto.id

                const clone = templateCarrito.cloneNode(true);
                fragment.appendChild(clone);
            })
            items.appendChild(fragment);

            if (Object.keys(carrito).length === 0) {
                $("#sub_total").val(0.00);
                $("#igv_total").val(0.00);
                $("#total").val(0);
            } else {

                const nCantidad = Object.values(carrito).reduce((acc, { cantidad }) => acc + cantidad, 0);
                const nPrecio = Object.values(carrito).reduce((acc, { cantidad, precio }) => acc + cantidad * precio, 0);


                var total = (nPrecio / 1.18).toFixed(2);
                $("#sub_total").val(total);
                $("#igv_total").val((total * 0.18).toFixed(2));

                $("#total").val(nPrecio);
            }
        } else {
            // console.log("excedio stock");
            ventasJS.msj.warning('Aviso:', 'Excedio el Sctock');
        }

        console.log(carrito);

    });

    function pintarCarrito() {
        items.innerHTML = ''

        Object.values(carrito).forEach(producto => {
            templateCarrito.querySelector('.badge-pill').dataset.id = producto.id_producto;
            templateCarrito.querySelector('.fa-trash').dataset.id = producto.id_producto;
            templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad;
            templateCarrito.querySelectorAll('td')[2].textContent = producto.nombre_producto;
            templateCarrito.querySelectorAll('td')[3].textContent = producto.precio;
            templateCarrito.querySelector('span').textContent = producto.precio * producto.cantidad;

            // //botones
            // templateCarrito.querySelector('.btn-info').dataset.id = producto.id
            // templateCarrito.querySelector('.btn-danger').dataset.id = producto.id

            const clone = templateCarrito.cloneNode(true);
            fragment.appendChild(clone);
        })
        items.appendChild(fragment);

        if (Object.keys(carrito).length === 0) {
            $("#sub_total").val(0.00);
            $("#igv_total").val(0.00);
            $("#total").val(0);
        } else {

            const nCantidad = Object.values(carrito).reduce((acc, { cantidad }) => acc + cantidad, 0);
            const nPrecio = Object.values(carrito).reduce((acc, { cantidad, precio }) => acc + cantidad * precio, 0);


            var total = (nPrecio / 1.18).toFixed(2);
            $("#sub_total").val(total);
            $("#igv_total").val((total * 0.18).toFixed(2));

            $("#total").val(nPrecio);
        }
    }

    function eliminar(e) {

        if (e.target.classList.contains('eliminar')) {

            var producto = carrito[e.target.dataset.id];
            console.log(producto);
            delete carrito[e.target.dataset.id];
            pintarCarrito();
        }

        e.stopPropagation();
    }

    $("#vaciar-producto").click(function() {
        carrito = {};
        items.innerHTML = ''

        Object.values(carrito).forEach(producto => {
            templateCarrito.querySelector('.badge-pill').dataset.id = producto.id_producto;
            templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad;
            templateCarrito.querySelectorAll('td')[2].textContent = producto.nombre_producto;
            templateCarrito.querySelectorAll('td')[3].textContent = producto.precio;
            templateCarrito.querySelector('span').textContent = producto.precio * producto.cantidad;

            // //botones
            // templateCarrito.querySelector('.btn-info').dataset.id = producto.id
            // templateCarrito.querySelector('.btn-danger').dataset.id = producto.id

            const clone = templateCarrito.cloneNode(true);
            fragment.appendChild(clone);
        })

        $("#sub_total").val(0.00);
        $("#igv_total").val(0.00);

        $("#total").val(0);
        items.appendChild(fragment);
    });




    $("#guardar_pago").click(function() {
        var msj_error = '';
        var genData = {};

        var id_venta = id_venta_general;
        var slccliente = $("#slccliente").val();
        var monto = $(".c_monto").val();
        var tipo = $('.tipo_pago').val();


        var monto_total = $("#monto_total").val();


        if (monto == '') {
            msj_error += 'Ingrese una monto a pagar. <br>';
        }

        if (parseFloat(monto) > parseFloat(monto_total)) {
            msj_error += 'Ingrese un monto correcto. <br>';
        }

        console.log(parseFloat(monto_total));
        console.log(parseFloat(monto));

        genData.venta = id_venta;
        genData.cliente = slccliente;
        genData.monto = monto;
        genData.tipo = tipo;


        if (msj_error == '') {

            ventaJS.agregar_pago(genData, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $("#modal-pedido").modal("hide");

                    $('.defa_pedido').addClass('d-none');
                    $('.defa_pedido').removeClass('d-block');
                    $('.exit_pedido').addClass('d-block');
                    $('.exit_pedido').removeClass('d-none');


                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
            });

        } else {
            ventasJS.msj.warning('Aviso:', msj_error);
        }

    })

});

$("#guardar-cliente").click(function() {

    var obj = {};
    obj.nombre = $("#nombres").val();
    obj.apellido_paterno = $("#apellido_paterno").val();
    obj.apellido_materno = $("#apellido_materno").val();
    obj.direccion = $("#direccion_cliente").val();
    obj.celular = $("#celular").val();
    obj.tipo_documento = $("#tipo_documento").val();
    obj.num_documento = $("#num_documento").val();

    var msj_error = '';

    if (obj.nombre == '') {
        msj_error += 'Ingrese nombre. <br>';
    }

    if (obj.apellido_paterno == '') {
        msj_error += 'Ingrese apellido paterno. <br>';
    }

    // if (obj.apellido_materno == '') {
    //     msj_error += 'Ingrese apellido materno. <br>';
    // }

    // if (obj.direccion == '') {
    //     msj_error += 'Ingrese Dirección. <br>';
    // }

    // if (obj.celular == '') {
    //     msj_error += 'Ingrese Celular. <br>';
    // }

    if (obj.tipo_documento == '') {
        msj_error += 'Ingrese Tipo de documento. <br>';
    }

    if (obj.num_documento == '') {
        msj_error += 'Ingrese Numero de Documento. <br>';
    }

    if (msj_error == '') {
        ventaJS.agregar_cliente(obj, function(data) {
            if (data.status == 'success') {
                ventasJS.msj.success('Aviso:', data.msg);
                $("#modal-cliente").modal('hide');

                $("#nombres").val('');
                $("#apellido_paterno").val('');
                $("#apellido_materno").val('');
                $("#direccion_cliente").val('');
                $("#celular").val('');
                $("#tipo_documento").val('1');
                $("#num_documento").val('');

                ventaJS.listar_cliente();


            } else {
                ventasJS.msj.warning('Aviso:', data.msg);
            }


        });

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }


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

    var msj_error = '';

    var slccliente = $("#slccliente").val();
    var fecha_pedido = $("#fechapedido").val();
    var fecha_entrega = $("#fechaentrega").val();

    // PRODUCTOS

    if (slccliente == '') {
        msj_error += 'Selecciona un Cliente. <br>';
    }

    if (fecha_pedido == '') {
        msj_error += 'Ingrese una Fecha de Pedido. <br>';
    }

    if (fecha_entrega == '') {
        msj_error += 'Ingrese una Fecha de Enetrega. <br>';
    }


    var cliente = {};
    cliente.id_cliente = slccliente;
    cliente.fecha_pedido = fecha_pedido;
    cliente.fecha_entrega = fecha_entrega;


    if (msj_error == '') {

        console.log(cliente);
        console.log(carrito);


    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }


    // $("#modal-pedido").modal("show");
    // $(".titulo-modal-cliente").html('<center>Registrar pedido</center>');
});
//


function pago(_tipo) {
    var text_l = "";
    var text_label = "";
    if (_tipo == 1) { text_l = "¿Pagar Pedido?" } else { text_l = "¿Fraccionar Pago?" }

    swal({
            title: text_l,
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

                if (_tipo == 1) { text_label = "" } else { text_label = " Primer " }
                $('.option').text(text_label);
                $('.formulario_pago').removeClass('d-none')
                $('.formulario_pago').addClass('d-block')
                $('.opciones').addClass('d-none')
                $('.opciones').removeClass('d-block');
                $('.tipo_pago').val(_tipo);

                if (_tipo == 1) {

                    var total = $("#total").val();
                    $("input[name='monto']").val(total);

                    $("input[name='monto']").prop("disabled", true);
                } else {
                    var total = $("#total").val();
                    $("#monto_total").val(total);
                }

            }
        });
}


$('.regresar').click(function() {
    $('.formulario_pago').addClass('d-none');
    $('.formulario_pago').removeClass('d-block');
    $('.opciones').removeClass('d-none');
    $('.opciones').addClass('d-block');
    $('.c_monto').val("");

    $("input[name*='monto']").val('');

    $("input[name*='monto']").prop("disabled", false);
});
// Exportar PDF

$(".generarComprobante").click(function() {
    $url = "/content/venta/pdfventa?cli=" + id_venta_general;
    window.open($url, "Pedido", 'width=702,height=750')

});


function solo_numero(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}