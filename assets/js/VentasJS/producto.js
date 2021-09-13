var productoJS = {

    obtener_producto: function(id, callback) {

        ventasJS.post('producto/obtenerProducto', { id: id }, function(data) {
            if (callback) {
                callback(data[0]);
            }
        });
    },

    agregar_stock: function(obj, callback) {

        // obj.id_producto = id_producto;
        // obj.stock = stock;

        ventasJS.post('producto/obtenerProducto', { id: obj.id_producto }, function(data) {

            // console.log(data[0].stock);
            var stock_actual = parseInt(data[0].stock);
            var stock_actualizado = stock_actual + parseInt(obj.stock);

            var body = {};
            body.id_producto = obj.id_producto;
            body.stock = stock_actualizado;

            ventasJS.post('producto/actualizarStock', body, function(data) {

                if (callback) {
                    callback(data);
                }
            });

        });
    },

    agregar_producto: function(obj, callback) {

        ventasJS.post('producto/registrarProducto', obj, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },

    editar_producto: function(obj, callback) {
        ventasJS.post('producto/actualizarProducto', obj, function(data) {
            if (callback) {
                callback(data);
            }

        });
    },

    eliminar_producto: function(id, callback) {

        var obj = {};
        obj.id_producto = id;
        ventasJS.post('producto/eliminarProducto', obj, function(data) {
            if (callback) {
                callback(data);
            }

        });
    },

    limpiar_formulario: function() {
        $('#id_producto').val('');
        $('#nombre_producto').val('');
        $('#stock_producto').val('');
        $('#stockmin_producto').val('');
        $('#nombre_categoria').val('0');
        $('#nombre_marca').val('0');
        $('#nombre_presentacion').val('0');
    },

    listarProductos: function() {
        var tblEntidad = $('#tablaproductos').DataTable({
            responsive: true,
            retrieve: true,
            ajax: {
                url: 'producto/listarProductos',
                data: { csrf_patbin_tkn: ventasJS.tk_v },
                type: 'POST',
                dataSrc: ""
            },
            columns: [{

                    title: 'N°',
                    data: 'id_producto',
                },
                {

                    title: 'NOMBRE DE PRODUCTO',
                    data: 'nombre_producto',
                },
                {

                    title: 'CATEGORÍA',
                    data: 'nombre_categoria',
                }, {

                    title: 'MARCA',
                    data: 'nombre_marca',
                }, {

                    title: 'PRESENTACIÓN',
                    data: 'nombre_presentacion',
                }, {

                    title: 'STOCK',
                    data: 'stock',
                }, {

                    title: 'STOCK MINIMO',
                    data: 'stock_minimo',
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
                            <button class="btn btn-info btn-sm" onclick="agregarStock(` + row.id_producto + `)"><i class="fas fa-plus" ></i></button>
                            <button class="btn btn-primary btn-sm" onclick="getProductoById(` + row.id_producto + `)"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminarProducto(` + row.id_producto + `)"><i class="fas fa-trash" ></i></button>
                            `;

                    },

                }

            ],
            dom: 'Bfrtip',
            "buttons": [{
                    extend: 'pdfHtml5',
                    text: '<i class="fa fa-file-pdf-o"></i> PDF ',
                    messageTop: function() {
                        return " ";
                    },
                    title: '',
                    titleAttr: 'Exportar a PDF',
                    download: 'open',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 5]
                    },
                    customize: function(doc) {
                        doc.content[1].table.widths =
                            Array(doc.content[1].table.body[0].length + 1).join('*').split('');

                        doc.content[1].alignment = 'center';

                        doc.content.splice(0, 0, {
                                columns: [{
                                    text: '"Tiendas de Pedidos "',
                                    fontSize: 10,
                                    italics: true,
                                    alignment: 'right',
                                    margin: [0, 15, 0, 15],
                                    width: '*'
                                }, ],
                            },

                            {
                                columns: [{
                                    text: 'REPORTE DE PRODUCTOS',
                                    fontSize: 14,
                                    bold: true,
                                    alignment: 'center',
                                    margin: [0, 10, 0, 5]
                                }]
                            }
                        )
                    }

                },
                {
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel-o"></i> EXCEL ',
                    messageTop: function() {
                        return " STOCK DE PRODUCTOS";
                    },
                    title: "REPORTE ",
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
            ]
        });
    },

    listarCategorias: function(select, selected, callback) {
        ventasJS.post('categoria/listarCategorias', {}, function(data) {
            $(select).html('<option value="0">-- Seleccione --</option>');
            $.each(data, function(index, obj) {
                var seleccionado = "";
                if (selected) {
                    if (selected == obj.id_categoria) {
                        seleccionado = "selected";
                    }
                }
                $(select).append('<option value="' + obj.id_categoria + '" ' + seleccionado + '>' + obj.nombre_categoria + '</option>');
            });
            if (callback) {
                callback();
            }
        });
    },

    listarMarcas: function(select, selected, callback) {
        ventasJS.post('marca/listarMarcas', {}, function(data) {
            $(select).html('<option value="0">-- Seleccione --</option>');
            $.each(data, function(index, obj) {
                var seleccionado = "";
                if (selected) {
                    if (selected == obj.id_marca) {
                        seleccionado = "selected";
                    }
                }
                $(select).append('<option value="' + obj.id_marca + '" ' + seleccionado + '>' + obj.nombre_marca + '</option>');
            });
            if (callback) {
                callback();
            }
        });
    },

    listarPresentaciones: function(select, selected, callback) {
        ventasJS.post('presentacion/listarPresentaciones', {}, function(data) {
            $(select).html('<option value="0">-- Seleccione --</option>');
            $.each(data, function(index, obj) {
                var seleccionado = "";
                if (selected) {
                    if (selected == obj.id_presentacion) {
                        seleccionado = "selected";
                    }
                }
                $(select).append('<option value="' + obj.id_presentacion + '" ' + seleccionado + '>' + obj.nombre_presentacion + '</option>');
            });
            if (callback) {
                callback();
            }
        });
    },

};

// $('#tablamarcas').DataTable({
//     responsive: true,

// });

$(document).ready(function() {
    productoJS.listarProductos();
    productoJS.listarCategorias("#nombre_categoria");
    productoJS.listarMarcas("#nombre_marca");
    productoJS.listarPresentaciones("#nombre_presentacion");
});




$("#btn-cancelar").click(function() {
    $("#modal-producto").modal("hide");
    productoJS.limpiar_formulario();
});

$("#btn-cancelar-stock").click(function() {
    $("#modal-stock").modal("hide");
    $("#agregar_stock_producto").val('');
    $("#id_producto_stock").val('');
});

$("#btn-guardar").click(function() {

    var id_producto = $.trim($('#id_producto').val());
    var nombre = $.trim($('#nombre_producto').val());
    var stock = $.trim($('#stock_producto').val());
    var stockmin = $.trim($('#stockmin_producto').val());
    var categoria = $.trim($('#nombre_categoria').val());
    var marca = $.trim($('#nombre_marca').val());
    var presentacion = $.trim($('#nombre_presentacion').val());

    var obj = {};
    obj.id_producto = id_producto;
    obj.nombre = nombre;
    obj.stock = stock;
    obj.stockmin = stockmin;
    obj.categoria = categoria;
    obj.presentacion = presentacion;
    obj.marca = marca;

    var msj_error = '';
    if (nombre == '') {
        msj_error += 'Ingresar Nombre de Producto. <br>';
    }
    if (stock == '') {
        msj_error += 'Ingresar Stock. <br>';
    }
    if (stockmin == '') {
        msj_error += 'Ingresar Stock Minimo. <br>';
    }
    if (categoria == '0') {
        msj_error += 'Ingresar Categoría. <br>';
    }
    if (presentacion == '0') {
        msj_error += 'Ingresar Presentación. <br>';
    }
    if (marca == '0') {
        msj_error += 'Ingresar Marca. <br>';
    }

    if (msj_error == '') {

        if (id_producto == '') {
            productoJS.agregar_producto(obj, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablaproductos').DataTable().destroy();

                    productoJS.listarProductos();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-producto").modal("hide");
                productoJS.limpiar_formulario();
            });
        } else {
            productoJS.editar_producto(obj, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablaproductos').DataTable().destroy();

                    productoJS.listarProductos();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-producto").modal("hide");
                productoJS.limpiar_formulario();
            });
        }

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }
});

$("#btn-actualizar-stock").click(function() {
    var id_producto = $.trim($('#id_producto_stock').val());
    var stock = $.trim($('#agregar_stock_producto').val());

    var obj = {};
    obj.id_producto = id_producto;
    obj.stock = stock;

    var msj_error = '';

    if (stock == '') {
        msj_error += 'Ingresar Stock. <br>';
    }

    if (msj_error == '') {

        productoJS.agregar_stock(obj, function(data) {
            console.log(data);
            if (data.status == 'success') {
                ventasJS.msj.success('Aviso:', data.msg);
                $('#tablaproductos').DataTable().destroy();
                productoJS.listarProductos();
            } else {
                ventasJS.msj.warning('Aviso:', data.msg);
            }
            $("#modal-stock").modal("hide");
            $("#agregar_stock_producto").val('');
            $("#id_producto_stock").val('');
        });

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }

});

$("#agregar-producto").click(function() {
    $("#modal-producto").modal("show");
    $("#titulo_modal").html('Registro de Producto');
});



function getProductoById(id) {
    productoJS.obtener_producto(id, function(data) {

        $("#modal-producto").modal("show");
        $("#titulo_modal").html('Editar de Producto');

        console.log(data);
        $('#id_producto').val(data.id_producto);
        $('#nombre_producto').val(data.nombre_producto);
        $('#stock_producto').val(data.stock);
        $('#stockmin_producto').val(data.stock_minimo);
        $('#nombre_categoria').val(data.id_categoria);
        $('#nombre_marca').val(data.id_marca);
        $('#nombre_presentacion').val(data.id_presentacion);

    });

}

function eliminarProducto(id) {


    ventasJS.msj.confirm("¿Está seguro de Eliminar?", "No podrá revertir los cambios", "warning", function() {
        productoJS.eliminar_producto(id, function(data) {
            if (data.status == 'success') {
                ventasJS.msj.success('Aviso:', data.msg);
                $('#tablaproductos').DataTable().destroy();
                productoJS.listarProductos();
            } else {
                ventasJS.msj.warning('Aviso:', data.msg);
            }
        });
    });
}

function agregarStock(id) {

    $("#modal-stock").modal("show");
    $("#titulo_modal").html('Agregar Stock a producto');
    $("#id_producto_stock").val(id);
}

function solo_numero(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}