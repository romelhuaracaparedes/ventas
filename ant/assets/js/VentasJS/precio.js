var precioJS = {

    obtener_producto: function(id, callback) {

        ventasJS.post('obtenerProducto', { id: id }, function(data) {
            if (callback) {
                callback(data[0]);
            }
        });
    },

    agregar_producto: function(obj, callback) {

        ventasJS.post('registrarProducto', obj, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },

    editar_producto: function(obj, callback) {
        ventasJS.post('actualizarProducto', obj, function(data) {
            if (callback) {
                callback(data);
            }

        });
    },

    eliminar_producto: function(id, callback) {

        var obj = {};
        obj.id_producto = id;
        ventasJS.post('eliminarProducto', obj, function(data) {
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
        $('#precio_compra').val('');
        $('#precio_venta_unit_producto').val('');
        $('#precio_venta_mayorista_producto').val('');
        $('#precio_venta_distribuidor_producto').val('');
        $('#nombre_categoria').val('0');
        $('#nombre_marca').val('0');
        $('#nombre_presentacion').val('0');
    },

    listarProductos: function() {
        var tblEntidad = $('#tablaproductos').DataTable({
            responsive: true,
            retrieve: true,
            ajax: {
                url: 'listarProductos',
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
                }, {

                    title: 'PRECIO VENTA UNIDAD',
                    data: 'precio_venta_unit',
                }, {

                    title: 'PRECIO VENTA MAYORISTA',
                    data: 'precio_venta_mayorista',
                }, {

                    title: 'PRECIO VENTA DISTRIBUIDOR',
                    data: 'precio_venta_distribuidor',
                }, {

                    title: 'PRECIO COMPRA',
                    data: 'precio_compra',
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
                            <button class="btn btn-primary btn-sm" onclick="getProductoById(` + row.id_producto + `)"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminarProducto(` + row.id_producto + `)"><i class="fas fa-trash" ></i></button>
                            `;

                    },

                }

            ]
        });
    },

    listarCategorias: function(select, selected, callback) {
        ventasJS.post('../categoria/listarCategorias', {}, function(data) {
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
        ventasJS.post('../marca/listarMarcas', {}, function(data) {
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
        ventasJS.post('../presentacion/listarPresentaciones', {}, function(data) {
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
    precioJS.listarProductos();
    precioJS.listarCategorias("#nombre_categoria");
    precioJS.listarMarcas("#nombre_marca");
    precioJS.listarPresentaciones("#nombre_presentacion");
});




$("#btn-cancelar").click(function() {
    $("#modal-producto").modal("hide");
    precioJS.limpiar_formulario();
});

$("#btn-guardar").click(function() {

    var id_producto = $.trim($('#id_producto').val());
    var nombre = $.trim($('#nombre_producto').val());
    var stock = $.trim($('#stock_producto').val());
    var stockmin = $.trim($('#stockmin_producto').val());
    var precio_compra = $.trim($('#precio_compra').val());
    var precio_venta_unit = $.trim($('#precio_venta_unit_producto').val());
    var precio_venta_mayorista = $.trim($('#precio_venta_mayorista_producto').val());
    var precio_venta_distribuidor = $.trim($('#precio_venta_distribuidor_producto').val());

    var categoria = $.trim($('#nombre_categoria').val());
    var marca = $.trim($('#nombre_marca').val());
    var presentacion = $.trim($('#nombre_presentacion').val());

    var obj = {};
    obj.id_producto = id_producto;
    obj.nombre = nombre;
    obj.stock = stock;
    obj.stockmin = stockmin;
    obj.precio_compra = precio_compra;
    obj.precio_venta_unit = precio_venta_unit;
    obj.precio_venta_mayorista = precio_venta_mayorista;
    obj.precio_venta_distribuidor = precio_venta_distribuidor;
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
    if (precio_compra == '') {
        msj_error += 'Ingresar Precio Compra. <br>';
    }
    if (precio_venta_unit == '') {
        msj_error += 'Ingresar Precio Venta Unidad. <br>';
    }
    if (precio_venta_mayorista == '') {
        msj_error += 'Ingresar Precio Venta Mayorista. <br>';
    }
    if (precio_venta_distribuidor == '') {
        msj_error += 'Ingresar Precio Venta Distribuidor. <br>';
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
            precioJS.agregar_producto(obj, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablaproductos').DataTable().destroy();

                    precioJS.listarProductos();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-producto").modal("hide");
                precioJS.limpiar_formulario();
            });
        } else {
            precioJS.editar_producto(obj, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $('#tablaproductos').DataTable().destroy();

                    precioJS.listarProductos();
                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
                $("#modal-producto").modal("hide");
                precioJS.limpiar_formulario();
            });
        }

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }
});

$("#agregar-producto").click(function() {
    $("#modal-producto").modal("show");
    $("#titulo_modal").html('Registro de Producto');
});



function getProductoById(id) {
    precioJS.obtener_producto(id, function(data) {

        $("#modal-producto").modal("show");
        $("#titulo_modal").html('Editar de Producto');

        console.log(data);
        $('#id_producto').val(data.id_producto);
        $('#nombre_producto').val(data.nombre_producto);
        $('#stock_producto').val(data.stock);
        $('#stockmin_producto').val(data.stock_minimo);
        $('#precio_compra').val(data.precio_compra);
        $('#precio_venta_unit_producto').val(data.precio_venta_unit);
        $('#precio_venta_mayorista_producto').val(data.precio_venta_mayorista);
        $('#precio_venta_distribuidor_producto').val(data.precio_venta_distribuidor);
        $('#nombre_categoria').val(data.id_categoria);
        $('#nombre_marca').val(data.id_marca);
        $('#nombre_presentacion').val(data.id_presentacion);

    });

}

function eliminarProducto(id) {

    ventasJS.msj.confirm("¿Está seguro de Eliminar?", "No podrá revertir los cambios", "warning", function() {
        precioJS.eliminar_producto(id, function(data) {
            if (data.status == 'success') {
                ventasJS.msj.success('Aviso:', data.msg);
                $('#tablaproductos').DataTable().destroy();
                precioJS.listarProductos();
            } else {
                ventasJS.msj.warning('Aviso:', data.msg);
            }
        });
    });

}