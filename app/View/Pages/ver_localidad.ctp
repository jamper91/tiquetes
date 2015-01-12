<a href="javascript:history.back(1)" class="btn btn-primary">Volver</a>
<?php
echo "<h2>".$location["Stage"]["esce_nombre"]." - ".$location["Location"]["loca_nombre"] ."</h2>" ;



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

		
<a href="#" onClick="return enviarCuadro('.$i.','.$j.','.$location["Location"]["id"].')" class="">
<img src="'.$this->webroot.'/images/'.$image.'.png'.'" data-toggle="modal" >
		</a>

		</td>';



	}
	echo "</tr>";



}

echo '</table>';
echo "<div>";

?>