<div class="users form"> 
    <?php echo $this->Form->create('User', array('action' => 'add2')); ?>
    <table>
        <tr>  


            <td >Número de Documento: </td>
            <td><input type="text" id="PersonalDatum_documento" name="data[PersonalDatum][documento]"/></td>
            <td>
                &nbsp;
            </td>            

            <?php
            if ($form != '') {
                $count = 0;
                foreach ($form as $value) {
                    ?>

                    <?php if ($count % 2 == 0) { ?>
                    </tr>
                    <tr>
                    <?php } ?>
                    <td><?php echo $value["PersonalDatum"]["descripcion"]; ?>
                    </td>
                    <?php
                    if ($value["PersonalDatum"]["tipo"] == "select") {
                        ?>
                        <td>
                            <select id="<?php echo 'data[PersonalDatum][' . $value["PersonalDatum"]["id"] ?>]" name="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]"  <?php if ($value["PersonalDatum"]["obligatorio"] == 1) { ?> required=<?php
                                        echo 'true';
                                    }
                                    ?>> 
                                <option>Seleccione <?php echo $value["PersonalDatum"]["descripcion"]; ?></option>    
                            </select> 
                        </td>
                        <?php
                    } elseif ($value["PersonalDatum"]["tipo"] == "checkbox") {
                        ?>
                        <td>
                            <input type="<?php echo $value["PersonalDatum"]["tipo"] ?>" 
                            <?php if ($value["PersonalDatum"]["obligatorio"] == 1) { ?>
                                       required=<?php
                                       echo 'true';
                                   }
                                   ?> id="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]" name="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]"/>
                        </td>
                        <?php
                    } elseif ($value["PersonalDatum"]["tipo"] == "radio") {
                        
                    } else {
                        ?>

                        <td><input type="<?php echo $value["PersonalDatum"]["tipo"] ?>" 
                            <?php if ($value["PersonalDatum"]["obligatorio"] == 1) { ?>
                                       required=<?php
                                       echo 'true';
                                   }
                                   ?> id="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]" name="data[PersonalDatum][<?php echo $value["PersonalDatum"]["id"] ?>]"/>
                        </td>




                        <?php
                    }
                    $count ++;
                }
            }
            ?>
        </tr>
    </table>
    <?php echo $this->Form->end(__('Enviar')); ?>
    <?php //echo $this->Form->create('User', array('action' => 'add2'));       ?>

</div>
