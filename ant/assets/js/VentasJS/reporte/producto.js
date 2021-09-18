var jsonDefault = {}


var reporteJS = {

    flltarreporte: function(dataGen, callback){
        ventasJS.post('filtrarventa', dataGen, function(data) {
            console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },
    listarPeroductos: function(param = null) {
        var tblEntidad = $('#tablaproductos').DataTable({
            responsive: true,
            retrieve: true,
            data:jsonDefault,
            columns: [{

                    title: 'N°',
                    data: 'id_venta',
                },
                {

                    title: 'FECHA ',
                    render: function(value, type, row) {
                        return "Pedido: " + row.fecha_pedido ;
                    }
                },
                {

                    title: 'PRODUCTO',
                    data: 'total',
                },
                {

                    title: 'STOCK',
                    data: 'total',
                }  
           
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

            ], 

        });
    },

}


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

    reporteJS.listarPeroductos()
});