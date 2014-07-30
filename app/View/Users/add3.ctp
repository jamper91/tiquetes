
<?php //debug($form); ?>
<div class="users form"> 
	<?php echo $this->Form->create('User', array('action' => 'edit2')); ?>
  	<table>
         <tr>  


          	<td >Número de Documento: </td>
          	<?php foreach ($person_id as $value){?>
            <td><input type="text" id="PersonalDatum_documento" name="data[PersonalDatum][documento][<?php echo $value?>]" value="<?php echo $documento ?>"/></td>
            <td>
            	<?php }?>
	          	&nbsp;
	        </td>            
            
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