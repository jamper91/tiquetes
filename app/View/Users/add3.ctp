
<?php //debug($form); ?>
<div class="users form"> 
	<?php echo $this->Form->create('User', array('action' => 'edit2')); ?>
  	<table>
         <tr>  


          	<td >Número de Documento: </td>
          	<?php foreach ($person_id as $value){?>
            <td><input type="text" id="PersonalDatum_documento" name="data[PersonalDatum][documento][<?php echo $value?>]" value="<?php echo $documento ?>"/>
            </td>
            <?php }?>
            <td>Codigo manilla</td>
            	<?php if(!empty($codigos)){?>
            	<?php foreach ($codigos as $codigo) { ?>
            	<td>
            		<input type="text" id="PersonalDatum_codigo" name="data[PersonalDatum][codigo][<?php echo $codigo?>]" value="<?php echo $codigo ?>"/>
            	</td>
            	<?php }
            		}	
            		else{?>
            		<td>
            		<input type="password" id="PersonalDatum_codigo" name="data[PersonalDatum][codigoNuevo]" value=""/>
            	</td>
            		<?php }?>

            	<td>Identificador manilla</td>
            	<?php if(!empty($identificador)){?>
            	
            	<td>
            		<input type="text" required="true" id="PersonalDatum_codigo" name="data[PersonalDatum][identificador][<?php echo $identificador?>]" value="<?php echo $identificador ?>"/>
            	</td>
            	<?php 
            		}	
            		else{?>
            		<td>
            		<input type="password" required="true" id="PersonalDatum_codigo" name="data[PersonalDatum][identificadorNuevo]" value=""/>
            	</td>
            		<?php }?>

            	
	                    
            
	<?php 
	if($form != '')
	{
			$count = 0;
	foreach ($form as $value) { ?>
	<?php //debug($value);?>
			<?php if($count%2 == 0){ ?>
			</tr>
			<tr>
			<?php } ?>
		 <td><?php echo $value["personal_data"]["descripcion"];?>
		 </td>
        <td><input type="<?php echo $value["personal_data"]["tipo"] ?>" 
        	<?php if($value["personal_data"]["obligatorio"] == 1){ ?>
        		required=<?php echo 'true';} ?> id="data[PersonalDatum][<?php echo $value["personal_data"]["id"] ?>]" name="data[PersonalDatum][<?php echo $value["datas"]["id"] ?>]" value="<?php echo $value["datas"]["descripcion"] ?>"/>
        	
        </td>

       

  
    <?php 
     $count ++; 
     } ?>
     <?php         
	 } ?>
	</tr>
	</table>

	   <?php echo $this->Form->end(__('Enviar')); ?>
	   <?php //echo $this->Form->create('User', array('action' => 'add2')); ?>

 </div>