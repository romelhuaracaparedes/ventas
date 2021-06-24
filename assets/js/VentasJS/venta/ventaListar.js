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

                    title: 'FECHA ',
                    render: function(value, type, row) {
                        return "Pedido: " + row.fecha_pedido + " <br> Entrega: " + row.fecha_entrega;
                    }
                },
                {

                    title: 'TOTAL S/.',
                    data: 'total',
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
                },
                {

                    title: 'PAGO',
                    render: function(value, type, row) {
                        var estado = {
                            0: { 'title': 'Deuda', 'class': 'badge-warning-light' },
                            1: { 'title': 'Pagado', 'class': 'badge-success-light' },

                        };

                        return '<span class="badge badge-pill ' + estado[row.flg_pago].class + ' ">' + estado[row.flg_pago].title + '</span>';
                    }

                },
                {

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
                            <a class="btn btn-info btn-sm" href="/ventas/content/venta/pago?venta=` + row.id_venta + `&cliente=` + row.id_cliente + `"><i class="fas fa-money" ></i></a>
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

$(function() {



    var espanol_daterangepicker = {
        "direction": "ltr",
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Aplicar",
        "cancelLabel": "Cancelar",
        "fromLabel": "De",
        "toLabel": "A",
        "daysOfWeek": [
            "Do",
            "Lu",
            "Ma",
            "Mi",
            "Ju",
            "Vi",
            "Sa"
        ],
        "monthNames": [
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"
        ],
        "firstDay": 1
    };

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        locale: espanol_daterangepicker,
        startDate: start,
        endDate: end,
        ranges: {
            'Hoy': [moment(), moment()],
            'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
            'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],

        }
    }, cb);

    cb(start, end);

});