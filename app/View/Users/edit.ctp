<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('multi-select', 'jscal2', 'steel', 'border-radius'));
?>
<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Editar Usuario'); ?></legend>
        <table>
            <tr>
                <td></td>
                <td><?php echo $this->Form->input('type_user_id', array('label' => 'Tipo de Usuario','required'=>'true'));?></td>
                <td></td>
                <td><?php echo $this->Form->input('department_id', array('label' => 'Departamento','required'=>'true')); ?></td>                
            </tr>
            <tr>
                <td></td>
                <td><?php echo $this->Form->input('username', array('label' => 'Nombre de usuario','required'=>'true'));?></td>
                <td></td>
                <td><?php echo $this->Form->input('password', array('label' => 'Contraseña', 'value'=>'','required'=>'true', 'type'=>'password'));?></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $this->Form->input('conpassword', array('label' => 'Confirmar contraseña','required'=>'true','type'=>'password'));?></td>
                <td></td>
                <td><?php echo $this->Form->input('id');?></td>
            </tr>
            <tr>
                <td><img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector" name="selector" style="cursor:pointer" /></td>
                <td><?php echo $this->Form->input('uservalidodesde', array('label' => 'Valido desde', 'value' => $this->Form->data['User']['validodesde'], 'readonly' => 'readonly', 'required'=>'true'));?></td>
                <td><img src="<?php echo $this->webroot . '/img/calendario.png' ?>"  id="selector2" name="selector2" style="cursor:pointer" /></td>
                <td><?php echo $this->Form->input('uservalidohasta', array('label' => 'Valido hasta', 'value' => $this->Form->data['User']['validohasta'], 'readonly' => 'readonly', 'required'=>'true'));?></td>
            </tr>
        </table>
        <?php
//		echo $this->Form->input('estado');		
       
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Actualizar')); ?>
</div>
<script>
    $(document).ready(function() {
        $("#UserEditForm").submit(function(e){
            
            if($("#UserPassword").val()===$("#UserConpassword").val()){
                return true;
            } else{
                alert("Error la contraseña no coinside con la confirmación");
                return false; 
            }
        });
    });
</script>
<script>
    Calendar.setup({
        inputField: "UserUservalidodesde",
        trigger: "selector",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>
<script>
    Calendar.setup({
        inputField: "UserUservalidohasta",
        trigger: "selector2",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%Y-%m-%d"
    });
</script>