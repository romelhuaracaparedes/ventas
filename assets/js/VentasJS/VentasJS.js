var ventasJS = {
    tk_k: null,
    tk_v: null,

    init: function(k, v) {
        this.tk_k = k;
        this.tk_v = v;
    },


    format: {
        decimal: function(num, decimal) {
            return parseFloat(Math.round(num * 100) / 100).toFixed(decimal);
        },
        digitos: function(num) {
            return parseFloat(Math.round(num * 100) / 100).toFixed(0);
        },
        minToTime: function(num_min) {
            var sec_num = parseInt(num_min * 60, 10); // don't forget the second param
            var hours = Math.floor(sec_num / 3600);
            var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            var seconds = sec_num - (hours * 3600) - (minutes * 60);

            if (hours < 10) { hours = "0" + hours; }
            if (minutes < 10) { minutes = "0" + minutes; }
            if (seconds < 10) { seconds = "0" + seconds; }
            return hours + ':' + minutes + ':' + seconds;
        },
        aMinutos: function(varHora) {
            arrhorasingle = new Array(0, 0, 0);
            arrhoras = varHora.split(":");
            for (x = 0; x < 3; x++) {
                arrhoras[x] = (isNaN(parseInt(arrhoras[x]))) ? 0 : parseInt(arrhoras[x]);
                arrhorasingle[x] += arrhoras[x];
            }
            var hora = arrhorasingle[0];
            var minutos = arrhorasingle[1];
            var segundos = arrhorasingle[2];
            //convirtiendo a segundos
            var hminutos = hora * 60; //hora a minutos
            var sminutos = segundos / 60; //seg a minutos
            var totalMinutos = hminutos + sminutos + minutos;
            return totalMinutos;
        }
    },

    msj: {
        success: function(titulo, mensaje) {
            $.toast().reset('all');
            $.toast({
                text: mensaje,
                heading: titulo,
                icon: 'success',
                showHideTransition: 'fade',
                allowToastClose: true,
                hideAfter: 3000,
                position: 'top-right',
                textAlign: 'left',
                loader: true,
                loaderBg: '#9EC600',
            });
        },
        error: function(titulo, mensaje) {
            $.toast().reset('all');
            $.toast({
                text: mensaje,
                heading: titulo,
                icon: 'error',
                showHideTransition: 'fade',
                allowToastClose: true,
                hideAfter: 3000,
                position: 'top-right',
                textAlign: 'left',
                loader: true,
                loaderBg: '#9EC600',
            });
        },
        confirm: function(titulo, mensaje, kallback) {
            // bootbox.confirm({
            //     title: titulo,
            //     message: mensaje,
            //     callback: function(confirm) {
            //         if (typeof kallback != "undefined") {
            //             kallback(confirm);
            //         }
            //     }
            // });
        },
        prompt: function(titulo, mensaje, kallback) {
            // bootbox.prompt({
            //     title: titulo,
            //     message: mensaje,
            //     inputType: 'text',
            //     callback: function(confirm) {
            //         if (typeof kallback != "undefined") {
            //             kallback(confirm);
            //         }
            //     }
            // });
        }
    },

    validarError: function(err) {
        this.msj.error('Error ' + err.status, err.responseText);
    },

    log: function(obj) {
        if (this.logEnabled) {
            console.log(obj);
        }
    },

    post: function(ruta, parametros, callback, callBackError) {

        // parametros[this.tk_k] = this.tk_v;

        $.post(ruta, parametros, function(data) {
            //SipcopJS.log(data);
            if (callback) {
                callback(data);
            }
        }, 'json').error(function(err) {
            ventasJS.validarError(err);
            if (callBackError) {
                callBackError(err);
            }
        });
    },

};