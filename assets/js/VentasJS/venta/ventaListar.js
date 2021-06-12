var pedidoJS = {

	listarPedidos: function() {
        var tblEntidad = $('#tablapedidos').DataTable({
            responsive: true,
            retrieve: true,
            ajax: {
                url: 'listarpedido',
                data: { csrf_patbin_tkn: ventasJS.tk_v },
                type: 'POST',
                dataSrc: ""
            },
            columns: [{

                    title: 'N° PEDIDO',
                    data: 'id_venta',
                },
                {

                    title: 'FECHA DE PEDIDO',
                    data: 'fecha_entrega',
                },
                {

                    title: 'FECHA ENTREGA',
                    data: 'fecha_pedido',
                }, {

                    title: 'ESTADO',

                    render: function(value, type, row) {
                        var estado = {
                            1: { 'title': 'Proforma', 'class': 'badge-warning-light' },
                            2: { 'title': 'Pedido', 'class': 'badge-primary-light' },

                        };

                        return '<span class="badge badge-pill ' + estado[row.tipo_estado].class + ' ">' + estado[row.tipo_estado].title + '</span>';
                    }
                }, {

                    title: 'DOCUMENTO',
                    data: 'numero_documento',
                }, {

                    title: 'CELULAR',
                    data: 'celular',
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
                            <button class="btn btn-primary btn-sm" onclick="getProductoById(` + row.id_venta + `)"><i class="fas fa-edit" ></i></button>
                            <button class="btn btn-danger btn-sm" onclick="eliminarProducto(` + row.id_venta + `)"><i class="fas fa-trash" ></i></button>
                            `;

                    },

                }

            ]
        });
    },

}


$(document).ready(function() {
    pedidoJS.listarPedidos();
});