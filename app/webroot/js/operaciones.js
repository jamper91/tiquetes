/* 
 * Diseñado por EnovaSoft Ingenieria LTDA.
 * Prohibida  su utilización sin previo consentimiento
 * Todos los Derechos Reservados.
 */
var urlbase="http://localhost/tiquetes/";
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