
var ventaJS = {

	agregar_pago: function(dataGen, callback){
        console.log(dataGen);
        ventasJS.post('agregarCouta', dataGen, function(data) {
            // console.log(data);
            if (callback) {
                callback(data);
            }

        });
    },

}

// modals 

$("#agregar-pago").click(function() {
    $("#modal-pago").modal("show");
    $("#titulo-modal-pago").html('<center>Registrar pago</center>');
});


$('.cancelar_pago').click(function(){
	$("#modal-pago").modal("hide");

	$('.c_monto').val("");
})
//

$("#guardar_pago").click(function(){
        var msj_error = ''; 
        var genData = {}; 

        var id_venta = $("#venta").val();
        var slccliente = $("#cliente").val();
        var monto = $(".c_monto").val();
        var total = $("#total").val();


        if (monto == '') {
            msj_error += 'Ingrese una monto a pagar. <br>';
        }

        genData.venta = id_venta;
        genData.cliente = slccliente;
        genData.monto = monto;
        genData.total = total;


        if (msj_error == '') {

            ventaJS.agregar_pago(genData, function(data) {
                if (data.status == 'success') {
                    ventasJS.msj.success('Aviso:', data.msg);
                    $("#modal-pedido").modal("hide");
                    location.reload();

                 } else {
                    ventasJS.msj.warning('Aviso:', data.msg);
                }
            });

        } else {
            ventasJS.msj.warning('Aviso:', msj_error);
        }

    })