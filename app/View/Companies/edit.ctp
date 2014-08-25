<div class="companies form">
    <?php echo $this->Form->create('Company'); ?>
    <fieldset>
        <legend><?php echo __('Crear Empresa'); ?></legend>
        <br>
        <legend><?php echo __('Datos del Representante Legal'); ?></legend>
        <table>
            <tr>
                <td colspan="2" align="center"><?php
                    echo $this->Form->input('pers_documento', array(
                        'label' => 'Identificación',
                        'required' => 'true',
                        'value' => $people [0]['p']['pers_documento']
                    ));
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('pers_primNombre', array(
                        'label' => 'Nombres',
                        'required' => 'true',
                        'value' => $people [0]['p']['pers_primNombre']
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('pers_primApellido', array(
                        'label' => 'Apellidos',
                        'required' => 'true'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('country_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "País",
                        "empty" => "Seleccione un País"
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('state_id', array(
                        "div" => array(
                            "class" => "controls"
                        ),
                        "label" => "Departamento",
                    ));
//                    
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('city_id', array(
                        'label' => 'Ciudad',
                        "empty" => "Seleccione Una Ciudad"
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('pers_direccion', array(
                        'label' => 'Dirección'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('pers_telefono', array(
                        'label' => 'Teléfono',
                        'required' => 'true'
                    ));
                    ?></td>
                <td><input type="hidden" name="data[Company][pers_id]" id="CompanyPers_id"></td>
            </tr>
        </table>
        <legend><?php echo __('Datos de la Empresa'); ?></legend>
        <table>
            <tr>
                <td><?php
                    echo $this->Form->input('empr_nit', array(
                        'label' => 'NIT'
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('empr_nombre', array(
                        'label' => 'Nombre',
                        'required' => 'true'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('empr_telefono', array(
                        'label' => 'Teléfono',
                        'required' => 'true'
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('empr_mail', array(
                        'label' => 'E-mail',
                        'type' => 'email'
                    ));
                    ?></td>
            </tr>
            <tr>
                <td> <?php
                    echo $this->Form->input('empr_direccion', array(
                        'label' => 'Dirección'
                    ));
                    ?></td>
                <td><?php
                    echo $this->Form->input('empr_barrio', array(
                        'label' => 'barrio'
                    ));
                    ?></td>                
            </tr>
            <tr>
                <td><?php
                    echo $this->Form->input('empr_pagiWeb', array(
                        'label' => 'Página WEB'
                    ));
                    ?></td>
            </tr>
        </table>

    </fieldset>
    <?php echo $this->Form->end(__('Editar')); ?>
</div>