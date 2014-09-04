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


		echo "<td>
		<form >
		<img src='".$this->webroot.'/images/'.$image.'.png' ."'>
		<input type='hidden' name='fil' value='".$i."'>   
		<input type='hidden' name='col' value='".$j."'>
		</form>

		</td>";

	}
	echo "</tr>";


	# code...
}

echo '</table>';

?>