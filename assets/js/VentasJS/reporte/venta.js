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
    listarPedidos: function(param = null) {
        var tblEntidad = $('#tablaventas').DataTable({
            responsive: true,
            retrieve: true,
            data:jsonDefault,
            columns: [{

                    title: 'N° PEDIDO',
                    data: 'id_venta',
                },
                {

                    title: 'FECHA ',
                    render: function(value, type, row) {
                        return "Pedido: " + row.fecha_pedido ;
                    }
                },
                {

                    title: 'TOTAL S/.',
                    data: 'total',
                }, {

                    title: 'ESTADO',

                    render: function(value, type, row) {
                        var estado = {
                            0: { 'title': 'Deuda', 'class': 'badge-warning-light' },
                            1: { 'title': 'Pagado', 'class': 'badge-success-light' },

                        };

                        return '<span class="badge badge-pill ' + estado[row.flg_pago].class + ' ">' + estado[row.flg_pago].title + '</span>';
                    }
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
            dom: 'Bfrtip',
            "buttons": [{
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i> PDF ',
                messageTop: function() {
                    return "FECHA: "+ $('#reportrange').data('daterangepicker').startDate.format('DD-MM-YYYY') +" AL "+$('#reportrange').data('daterangepicker').endDate.format('DD-MM-YYYY')+"  VENDEDOR: "+$('#slcvendedor :selected').text();
                },
                title: '',
                titleAttr: 'Exportar a PDF',
                download: 'open',
                exportOptions: {
                    columns: ':visible'
                },
                customize: function (doc) {
                    doc.content[1].table.widths = 
                    Array(doc.content[1].table.body[0].length + 1).join('*').split('');

                    doc.content[1].alignment = 'center';

                    doc.content.splice(0, 0, {
                        columns: [
                            {
                                text: '"Tiendas de Pedidos "',
                                fontSize: 10,
                                italics: true,
                                alignment: 'right',
                                margin: [0, 15, 0, 15],
                                width: '*'
                            },
                        ],
                    },

                    {
                        columns: [{
                            text: 'REPORTE DE VENTAS',
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
                    return "FECHA: "+ $('#reportrange').data('daterangepicker').startDate.format('DD-MM-YYYY') +" AL "+$('#reportrange').data('daterangepicker').endDate.format('DD-MM-YYYY')+"  VENDEDOR: "+$('#slcvendedor :selected').text();
                },
                title: "REPORTE DE VENTAS",
                exportOptions: {
                    columns: ':visible'
                }
            },
            ]
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

    reporteJS.listarPedidos()
});

$('#search_report').click(function(){
    var fechaStart = $('#reportrange').data('daterangepicker').startDate.format('YYYY-MM-DD');
    var fechaEnd   = $('#reportrange').data('daterangepicker').endDate.format('YYYY-MM-DD');
    var vendedor   = $('#slcvendedor').val();

    var genData ={};
    var msj_error = '';

    genData.fechaStart =fechaStart;
    genData.fechaEnd =fechaEnd;
    genData.vendedor =vendedor;

    if (vendedor == '') {
        msj_error = "Seleccione vendedor";
    }

    if (msj_error == '') {

        reporteJS.flltarreporte(genData, function(data) {
            if (data.length >0) {

                ventasJS.msj.success('Aviso:', 'Datos cargados!');
                $('#tablaventas').dataTable().fnClearTable();
                $("#tablaventas").dataTable().fnAddData(data);
                $('#tablaventas').dataTable().fnDraw();
            }else{
                $('#tablaventas').dataTable().fnClearTable();
                ventasJS.msj.warning('Aviso:',"Sin registros");

            }

            
        });

    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }

});


$('#slcvendedor').select2({
    language: {
        noResults: () => "No se encontraron resultados"
    },
    placeholder: "Digita el nombre del cliente"
});






