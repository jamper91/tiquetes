<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<h2><?php echo __d('cake_dev', 'Bienvenido al administrador de contenidos de eventos Ticket Express ', Configure::version()); ?></h2>
<?php
if ($this->Session->read('event_id') == NULL) {
    ?>
    <div class="users form">
        <form id="UserEventsessionForm" accept-charset="utf-8"  method="post" action="/tiquetes/users/Eventsession" >
            <?php // echo $this->Form->create('User');  ?>
            <fieldset>
                <legend>
                    <?php echo __('Seleccione el evento y confirme'); ?>
                </legend>
                <?php
                $events = $this->Session->read('EventsList');
                echo $this->Form->input('event_id', array(
                    "div" => array(
                        "class" => "controls"
                    ),
                    "label" => "Evento",
                    "options" => $events, //"Event.even_nombre",
                    'required' => 'true',
                    "empty" => "Seleccione un Evento"
                ));
                ?>
            </fieldset>
            <input type="submit" value="CONFIRMAR" id="enviar" class="btn-primary">
            <?php // echo $this->Form->end(__('Confirmar'));  ?>
        </form>                  
    </div>
    <?php
}
?>
