<?php
echo $this->Html->script(array('jquery.multi-select', 'jscal2', 'es'));
echo $this->Html->css(array('multi-select', 'jscal2', 'steel', 'border-radius'));
?>
<div class="events form" align="center">
    <?php echo $this->Form->create('Activity'); ?>
    <h1>Registro para actividades</h1>
    <br>
    <table>
        <tr>
            
            <td colspan="4" align="center"><?php
                echo $this->Form->input('activity_id', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    'label' => 'Actividad',
                    "options" => $actividades,
                    "empty" => "Seleccione una actividad",
                    'required'=>'true'
                ));
                ?></td>            
        </tr>
        <tr>
            <td>Escarapela</td>
            <td><?php echo $this->Form->input('escarapela', array('label' => '')); ?></td>
            <td>Documento</td>
            <td><?php echo $this->Form->input('documento', array('label' => '')); ?></td>           
        </tr>        
        
    </table>    <?php echo $this->Form->end('Registro'); ?>
</div>
