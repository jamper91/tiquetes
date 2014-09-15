<!--<script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.js"></script>-->
<!-- Button to trigger modal -->

<?php


/*foreach ($ as  $value) {
	# code...
}*/


echo "<h1>".$location["Stage"]["esce_nombre"]." - ".$location["Location"]["loca_nombre"] ."" ;




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

		<a href="#myModal_'.$i.$j.'"  class="" data-toggle="modal">
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











		/*echo "<td>
		<form id='post_".$i.$j."' action='post.php'>
	<img id='forms_".$i.$j."' src='".$this->webroot.'/images/'.$image.'.png' ."'   data-toggle='modal' >
		<input type='hidden' name='fil' value='".$i."'>   
		<input type='hidden' name='col' value='".$j."'>
		</form>
		<script type='text/javascript'>
			$(document).ready(function() {
				
				$('#forms_".$i.$j."').on('click', function () {
				     // $('#forms_".$i.$j."').popover('show');
				      console.log('TEXT ".$i." ".$j." '   );
				     // $('#myModal_".$i.$j."').modal('show');
				      $('#forms_".$i.$j."').modal('show');
				      /*$.ajax
					    ({ 
					        url: 'reservebook.php',
					        data: {'bookID': 'book_id'},
					        type: 'post',
					        success: function(result)
					        {
					            $('#myModal_".$i.$j."').text(result).fadeIn(700, function() 
					            {
					                setTimeout(function() 
					                {
					                    $('#myModal_".$i.$j."').fadeOut();
					                }, 2000);
					            });
					        }
					    });








				 });
			});

		</script>

		<div class='modal hide fade' id='forms_".$i.$j."'>
		  <div class='modal-header'>
		    <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
		    <h3>Modal header</h3>
		  </div>
		  <div class='modal-body'>
		    <p>One fine body…</p>
		  </div>
		  <div class='modal-footer'>
		    <a href='#' class='btn'>Close</a>
		    <a href='#' class='btn btn-primary'>Save changes</a>
		  </div>
		</div>






		</td>";*/

	}
	echo "</tr>";


	# code...
}

echo '</table>';

?>
