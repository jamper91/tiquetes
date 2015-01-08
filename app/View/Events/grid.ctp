<!--<script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.js"></script>-->
<!-- Button to trigger modal -->
<div id='contenido'>
	<a href="javascript:history.back(1)" class="btn btn-primary">Volver</a>
<?php


/*foreach ($ as  $value) {
	# code...
}*/
$parametros=$this->request->params["pass"];

echo "<h1>".$location["Stage"]["esce_nombre"]." - ".$location["Location"]["loca_nombre"] ."" ;
?>

<fieldset>
	<label style="display: inline-block;"><h4>Elige el Tipo :</h4> </label>
	<select name="tipo" id="tipo">
	  <option value="way">Pasillo</option>
	  <option value="chair">Silla</option>
	</select>
</fieldset>


<?php





/*foreach ($grid as $key => $value) {
	# code...
	echo "<pre>";
	var_dump($value["grid_location"]);
	echo "</pre>";
}*/


$filas=$location["Location"]["loca_fila"];
$columnas=$location["Location"]["loca_colomnna"];




echo '<table width="auto" border="0" cellpadding="0" cellspacing="0" >';
for ($i=1; $i <=$filas ; $i++) { 
	echo "<tr>";
	for($j=1;$j<=$columnas;$j++){
		$image='chair';
		
		foreach ($grid as $key => $value) {  //recorremos la tabla buscando asignaciones de otros espacios
	
			if($value["grid_location"]["fila"]==$i  && $value["grid_location"]["columna"]==$j ){
				$image=$value["grid_location"]["val"];
			}

		}


		echo '<td>

		<!--<a href="#myModal_'.$i.$j.'"  class="" data-toggle="modal">-->
<a href="#" onClick="return enviarCuadro('.$i.','.$j.','.$location["Location"]["id"].')" class="">
<img src="'.$this->webroot.'/images/'.$image.'.png'.'" data-toggle="modal" >
		</a>

 
<!-- Modal -->
<div id="myModal_'.$i.$j.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Cambio de tipo Espacio '.$i.' - '.$j.'</h3>
  </div>
  <div class="modal-body">
    <!--<p>One fine body…</p>-->

    <form id="form-id" action="'.$this->Html->url(array('controller' => 'Events', 'action' => 'guardagrid')).'"  method="post">
    <fieldset>
    <label>Tipo : </label>
    <select name="tipo">
	  <option value="way">Pasillo</option>
	  <option value="chair">Silla</option>
	</select>
	</fieldset>


	<input type="hidden" name="fil" value="'.$i.'">   
	<input type="hidden" name="col" value="'.$j.'">
	<input type="hidden" name="loca" value="'.$location["Location"]["id"].'">
	

	<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
	<input type="submit" class="btn btn-primary" value="guardar" onclick="document.getElementById(\'form-id\').submit();">

    </form>




  </div>
  <!--<div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Guardar</button>
  </div>-->
</div>





		</td>';



	}
	echo "</tr>";



}

echo '</table>';
echo "<div>";

?>
<script type="text/javascript">

function enviarCuadro(fil,col,loca){

	var tipo=$("#tipo").val();

	var formData = {fil:fil,col:col,loca:loca,tipo:tipo}; //Array 
 
	$.ajax({
	    url : "<?=$this->Html->url(array('controller' => 'Events', 'action' => 'guardagrid'))?>",
	    type: "POST",
	    data : formData,
	    success: function(data, textStatus, jqXHR)
	    {
	        //data - response from server
	        $("#contenido").load(urlbase+"Events/grid/<?=$parametros[0]?>/<?=$parametros[1]?>");
	        setTimeout(function() {
			   $("#tipo").val(tipo);
			}, 100);
	        
	    },
	    error: function (jqXHR, textStatus, errorThrown)
	    {
	 	console.log("error");
	    }
	});

}

</script>