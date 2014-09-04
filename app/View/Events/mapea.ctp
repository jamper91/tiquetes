
<div id="contenido">


<?php

/*echo "<pre>";
var_dump($locations);
echo "</pre>";
*/

$stage=$event["Event"]["stage_id"];
$parametros=$this->request->params["pass"];

echo "<h1>".$event["Event"]["even_nombre"]."</h1>";
echo "<h2>".$event["Stage"]["esce_nombre"]."</h2>";

if($parametros[1]>0){
  echo "<p>".$this->Html->link(__('Finalizar Edicion'), array('action' => 'mapea', $parametros[0],0),array('class'=>'btn btn-success btn-mini'))."</p>"; 
}


echo "<b>Localidades:</b> ";




foreach ($locations as $key => $value) {

    $value=$value["Location"];

    echo "<li> <b>".$value["loca_nombre"]."</b>";

    /*$this->Html->link($value["loca_nombre"], array(
        'controller'=>'Events','action'=>'mapea',$parametros[0],$value["id"]))."</b>";*/

     echo ($value["coord"]!=" ")? "(SI) ":" (NO) ";

     echo $this->Html->link('Cuadricula', array(
        'controller'=>'Events','action'=>'grid',$parametros[0],$value["id"]),array('class'=>'btn btn-mini btn-success'));
     echo $this->Html->link('Editar', array(
        'controller'=>'Events','action'=>'mapea',$parametros[0],$value["id"]),array('class'=>'btn btn-mini btn-warning'));
     echo $this->Html->link('Borrar', array(
        'controller'=>'Events','action'=>'borrar',$parametros[0],$value["id"]),array('class'=>'btn btn-mini btn-danger'));



      echo "</li>";
}





?>


<img id="mapeos" src="<?php echo $this->webroot.'/img/escenario/'.$event["Stage"]["esce_mapa"] ?>" usemap="#esenario" >
<map id="image_map" name="esenario">



<?php 

$href='href="#"';

if($parametros[1]!=0){ // si estamos en edicion
    $href='nohref';

}

 foreach ($locations as $key => $value) {

    $location=$value["Location"];  ?>
  
<area  <?=$href?>  full="<?=$location['loca_nombre']?>" shape="poly" coords="<?=$location['coord']?> " state="WL-<?=$location['id']?>"  nohref ></area>
<?php }  ?>

</map>



<script type="text/javascript" src="http://www.outsharked.com/scripts/jquery.imagemapster.js"></script>


<script type="text/javascript">
var basic_opts = {
    mapKey: 'state'
};

var initial_opts = $.extend({},basic_opts, 
    { 
        staticState: true,
        fill: false,
        stroke: true,
        strokeWidth: 2,
        strokeColor: 'ff0000',
        noHrefIsMask: false,

    });

$('img').mapster(initial_opts)
    .mapster('set',true,'WL-<?=$parametros[1]?>', {
        fill: true,
        fillColor: '00ff00'

    })
    .mapster('snapshot')
    .mapster('rebind',basic_opts);




$( '#mapeos' ).on( 'click', function( e ) {

   var evtobj=window.event? event : e.originalEvent;
   //evtobj=e;
   console.log(evtobj);

    clickX = evtobj.layerX;
    clickY = evtobj.layerY;

    
    var coord=" "+clickX+","+clickY+",";

    var formData = {event:"<?=$parametros[0]?>",location:"<?=$parametros[1]?>",coord:coord}; //Array 
 
        var form = $(this);
    $.ajax({
        url : urlbase+"Stages/guardacoords",
        type: "POST",
        data : formData,
        success: function(data, textStatus, jqXHR)
        {
           
            console.log(formData.stage);
            
            $("#contenido").load(urlbase+"Events/mapea/"+formData.event+"/"+formData.location+"");

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
     
        }
    });



    console.log("X= "+clickX+" Y= "+clickY);

});



</script>


<?php
/*echo "mapea";

echo "<pre>";
var_dump($stage);
echo "</pre>";
*/
?>

</div> <!--FIN Contenido-->




