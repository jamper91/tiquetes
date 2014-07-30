<div class="users form"> 
	<legend><?php echo __('Buscador'); ?></legend>
	<?php echo $this->Form->create('User', array('action' => 'buscador')); ?>
  	<table>
  		<tr>
			<td >N&uacute;mero de Documento: </td>
            <td><input type="text" id="PersonalDatum_documento" name="data[PersonalDatum][documento]"/></td>
            <td>
	          	&nbsp;
	        </td> 
	</tr>
         <tr>             
            
	<?php 
	
	$count = 0;
	foreach ($form as $value) { ?>

			<?php if($count%3 == 0){ ?>
			</tr>
			<tr>
			<?php } ?>
		 <td><?php echo $value["PersonalDatum"]["descripcion"];?>
		 </td>
        <td><input type="<?php echo $value["PersonalDatum"]["tipo"] ?>" 
        	id="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]" name="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]"/>
        </td>
        
       
    <?php 
     $count ++;          
	 } ?>
	</tr>
	
	</table>
	   <?php echo $this->Form->end(__('Enviar')); ?>
	  
 </div>
<?php if(isset($datosvista)){?>

  	<div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Resultado de la b&uacute;squeda</h5>
           
        </div>
    	<div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                    	<?php 

                    	foreach ($form as $value) 
                    		{ ?>
                    			
	                            <th><?php echo $value["PersonalDatum"]["descripcion"];?></th>
	                 
							<?php } ?>
                        <th>Documento</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                	<?php $con = 0; 
                		
                        foreach ($datosvista as $datovista){ ?>
	                        <tr>
	                        	<?php 

									foreach ($form as $value) 
                    				{ 
                    			
	                             		$PersonalDatum_id=$value["PersonalDatum"]["id"];
	                             		$esta=0;
	                             		foreach ($datovista as $dato){
	                             			$aux2343=$dato["personal_data"]["id"];
	                             			
	                             			if($aux2343==$PersonalDatum_id){
	                             				echo "<td>".$dato["datas"]["descripcion"]."</td>";
	                             				$esta=1;
	                             			} ?>
	                             				  

	                             		<?php }	
	                             		if($esta==0)
	                             		{
	                             			echo "<td>-</td>";
	                             		}
	                 
								 	} 
								 ?>
	                        	<td><?php $aux1 = $datosvista2[$con];
	                        			$aux1 = $aux1[0];
	                        			echo $aux1['people']['pers_documento']; 
	                        		 ?>
	                        	</td>
	                        	<td>
                    	             <?php echo $this->Form->create('User', array('action' => 'add3')); ?>
									<input type='hidden' id='datosUsuario' name='user' value=<?php echo $aux1['people']['pers_documento'];?>>
		                            <input type='hidden' id='datosEvent' name='event' value=<?php echo $event_id; ?>>
		                            <button  id="enviar-usu-proy" class="btn btn-primary pull-right"> Editar</button>
		                          
		                        </form>
	                        					

	                        	
	                        	</td> 
		                    </tr>
                    <?php $con ++;
                     	} ?>
                </tbody>
            </table>
        </div>
    </div>
<?php }?>

<script>
// $(function (){
// 	$("#event_id").change(function() { 
// 	 	var event_id = $(this).val();
// 		alert(event_id);
// 		$("#enviar-usu-proy").click(function(){
// 		//$("#datosUsuario").val('algo');
// 		$("#datosEvent").val(event_id);
//         $("#formpdf").submit();
//         });
// 	});
// });
</script>