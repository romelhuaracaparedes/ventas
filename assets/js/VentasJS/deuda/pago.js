var deudaJS = {

    deuda: parseInt($("#valor_deuda").val()),

    init: function() {
        (this.deuda > 0) ? $("#div_agregar").show(): $("#div_agregar").hide();
    },

    agregar_pago: function(dataGen, callback) {

        ventasJS.post('agregarCouta', dataGen, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },

    editar_pago: function(dataGen, callback) {

        ventasJS.post('editarCouta', dataGen, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },

    obtener_pago: function(id_pago) {

        ventasJS.post('obtenerDeuda', { id_pago: id_pago }, function(data) {
            var datos = data[0];
            $("input[name*='monto']").val(datos.monto);
            $("#monto_deuda").val(datos.monto);


        });

    }

};

$(document).ready(function() {
    deudaJS.init();
});

// modals 

$("#agregar-pago").click(function() {
    $("#modal-pago").modal("show");
    $("#titulo-modal-pago").html('<center>Registrar pago</center>');
});


$('.cancelar_pago').click(function() {
    $("#modal-pago").modal("hide");

    $('.c_monto').val("");
});
//

$("#guardar_pago").click(function() {
    var msj_error = '';
    var genData = {};

    var id_venta = $("#venta").val();
    var slccliente = $("#cliente").val();
    var monto = $(".c_monto").val();
    var total = $("#total").val();

    var monto_anterior = $("#monto_deuda").val();

    var id_pago = $("#id_pago").val();


    if (monto == '') {
        msj_error += 'Ingrese una monto a pagar. <br>';
    }


    if (id_pago == '') {
        if (parseFloat(deudaJS.deuda) < parseFloat(monto)) {

            console.log(parseFloat(deudaJS.deuda));
            console.log(parseFloat(monto));
            msj_error += 'Ingrese como maximo monto restante S/.' + deudaJS.deuda + '<br>';
        }
    } else {
        if ((parseFloat(monto_anterior) + parseFloat(deudaJS.deuda)) <= (parseFloat(monto))) {
            msj_error += 'Ingrese como maximo monto restante S/.' + (parseFloat(monto_anterior) + deudaJS.deuda) + '<br>';
        }
    }


    genData.venta = id_venta;
    genData.cliente = slccliente;
    genData.monto = monto;
    genData.total = total;

    genData.id_pago = id_pago;



    if (msj_error == '') {


        if (id_pago == '') {
            deudaJS.agregar_pago(genData, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $("#modal-pedido").modal("hide");
                    location.reload();

                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
            });
        } else {
            deudaJS.editar_pago(genData, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $("#modal-pedido").modal("hide");
                    location.reload();

                } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
            });
        }


    } else {
        ventasJS.msj.warning('Aviso:', msj_error);
    }

});

function obtener_pago(id_pago) {

    $("#modal-pago").modal("show");
    $("#titulo-modal-pago").html('<center>Editar pago</center>');
    deudaJS.obtener_pago(id_pago);
    $("#id_pago").val(id_pago);
}