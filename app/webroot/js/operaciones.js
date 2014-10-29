/* 
 * Diseñado por EnovaSoft Ingenieria LTDA.
 * Prohibida  su utilización sin previo consentimiento
 * Todos los Derechos Reservados.
 */
var urlbase = "http://localhost/tiquetes/";
//var urlbase = "http://192.168.0.151/tiquetes/";
function ajax(url2, datos, callback)
{

    //checkInternet();
    var retornar = null;
    $.ajax({
        url: url2,
        type: "POST",
        timeout: 10000,
        data: datos,
        headers: {'Access-Control-Allow-Origin': '*'},
        crossDomain: true,
        error: function(jqXHR, textStatus, errorThrown)
        {

        },
        success: function(data)
        {
            retornar = data;
        }
    }).done(function()
    {
        callback(retornar);
    });
}
function conMayusculas(datos) { 
    return datos.toUpperCase();
}

function soloNumeros(event) {
    if (event.shiftKey)
    {
        event.preventDefault();
    }
    if (event.keyCode === 46 || event.keyCode === 8 || event.keyCode === 9 || event.keyCode === 10 || event.keyCode === 37 || event.keyCode === 39 || event.keyCode === 17) {
    }
    else {
        if (event.keyCode < 95) {
            if (event.keyCode < 48 || event.keyCode > 57) {
                event.preventDefault();
            }
        }
        else {
            if (event.keyCode < 96 || event.keyCode > 105) {
                event.preventDefault();
            }
        }
    }
}

