<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Ticket Express');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?></title>

        <?php
//        echo $this->Html->css(array('bootstrap', 'style', 'menuVertical'));
        echo $this->Html->css(array('bootstrap.min', 'bootstrap-responsive.min', 'matrix-style', 'matrix-media', 'jquery.gritter', "select2"));
        echo $this->Html->css(array('colorpicker', 'datepicker.css', 'uniform', 'bootstrap-wysihtml5'));
//        echo $this->Html->script(array('jquery.min', 'menu_jquery2', 'operaciones'));
        echo $this->Html->script(array('excanvas.min', 'jquery.min', 'operaciones', 'jquery.ui.custom', 'bootstrap.min', 'jquery.flot.min', 'jquery.flot.resize.min', 'jquery.peity.min', 'fullcalendar.min'));
        echo $this->Html->script(array('matrix', 'matrix.dashboard', 'jquery.gritter.min', 'matrix.interface', 'matrix.chat', 'jquery.validate', 'matrix.form_validation', 'jquery.wizard', 'jquery.uniform'));
        echo $this->Html->script(array('select2.min', 'matrix.popover', 'jquery.dataTables.min', 'matrix.tables'));
        ?>
        <link href="http://localhost/tiquetes/font-awesome/css/font-awesome.css" rel="stylesheet" />        
        <?php
        echo $this->Html->meta('icon');


        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        echo $this->Html->script(array('jquery.form', 'jquery-1.11.0.min'));
        ?>
<!--        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script> -->
    </head>

    <body>
        <!--Header-part-->
        <div id="header">
            <h1><a >Ticket Express</a></h1>
        </div>
        <!--close-Header-part-->         
        <!--top-Header-menu-->
        <div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav">
                <li  class="dropdown" id="profile-messages" >
                    <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
                        <i class="icon icon-user"></i>  <span class="text">Bienvenido Admin</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-user"></i> Mi Perfil</a></li>
                        <li class="divider"></li>
                        <li class="divider"></li>
                        <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "logout")); ?>"><i class="icon-key"></i> Cerrar Sesion</a></li>
                    </ul>
                </li>
                <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Mensajes</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> Crear Mensaje</a></li>
                        <li class="divider"></li>
                        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> Bandeja Entrada</a></li>
                        <li class="divider"></li>
                        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> Salida</a></li>
                        <li class="divider"></li>
                        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> Eliminados</a></li>
                    </ul>
                </li>
                <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
                <li class=""><a title="" href="<?= $this->Html->url(array("controller" => "users", "action" => "logout")); ?>"><i class="icon icon-share-alt"></i> <span class="text">Cerrar Sesion</span></a></li>
            </ul>
        </div>
        <!--close-top-Header-menu-->
        <!--start-top-serch-->
        <div id="search">
            <input type="text" placeholder="Search here..."/>
            <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
        </div>
        <!--close-top-serch-->
        <!--sidebar-menu-->
        <div id="sidebar">
            <?php if ($authUser) {
                ?>
                <a href="#" class="visible-phone">
                    <i class="icon icon-home"></i> Dashboard</a>

                <ul id="menu">
                    <?php if (in_array('geografia', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                        <li class="submenu"  > 
                            <a href="#">
                                <i class="icon icon-fullscreen"></i> 
                                <span>Geografia</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "countries", "action" => "add")); ?>">Paises</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "states", "action" => "add")); ?>">Departamentos</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "cities", "action" => "add")); ?>">Ciudades</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (in_array('escenario', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                        <li class="submenu"  > 
                            <a href="#">
                                <i class="icon icon-th-list"></i> 
                                <span>Gestionar Escenario</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "Stages", "action" => "add")); ?>">Crear Escenario</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "Stages", "action" => "index")); ?>">Listar Escenarios</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (in_array('escenario', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                        <li class="submenu"  > 
                            <a href="#">
                                <i class="icon icon-th-list"></i> 
                                <span>Gestionar Empresa</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "Companies", "action" => "add")); ?>">Crear Empresa</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "Companies", "action" => "index")); ?>">Listar Empresas</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "rolecompanies", "action" => "add")); ?>">Crear Petrocinador</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "rolecompanies", "action" => "index")); ?>">Listar Patrocinadores</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (in_array('eventos', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>

                        <li class="submenu"  > 
                            <a href="#">
                                <i class="icon icon-th-list"></i> 
                                <span>Gestionar Eventos</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "Events", "action" => "index")); ?>">Lista de eventos</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "EventTypes", "action" => "add")); ?>">Crear Tipos de Evento</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "Events", "action" => "add")); ?>">Crear Evento</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "Locations", "action" => "add")); ?>">Crear Localidad</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "Categorias", "action" => "add")); ?>">Crear Categorias</a></li>
                                <!--<li><a href="<?= $this->Html->url(array("controller" => "Shelves", "action" => "add")); ?>">Crear Grupo de Estan</a></li>-->
                                <!--<li><a href="<?= $this->Html->url(array("controller" => "Inputs", "action" => "add")); ?>">Crear entradas por Evento</a></li>-->


                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (in_array('usuarios', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                        <li class="submenu"  > 
                            <a href="#">                        
                                <i class="icon icon-fullscreen"></i> 
                                <span>Gestionar Usuarios</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "add")); ?>">Crear Usuario</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "users", "action" => "index")); ?>">Listar Usuario</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "TypeUsers", "action" => "add")); ?>">Crear Tipo de Usuario</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "TypeUsers", "action" => "index")); ?>">Listar Tipos de Usuario</a></li>

                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (in_array('formularios', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                        <li class="submenu"  > 
                            <a href="#">
                                <i class="icon icon-th-list"></i> 
                                <span>Formularios</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "PersonalData", "action" => "add")); ?>">Crear Campos</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "forms", "action" => "add")); ?>">Formularios</a></li>
                            </ul>
                        </li>
                    <?php } ?>                    
                    <?php if (in_array('personas', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>

                        <li class="submenu"> 
                            <a href="#">
                                <i class="icon icon-th-list"></i> 
                                <span>Gestionar Personas</span>
                            </a>
                            <ul>
                                <!--<li><a href="<?= $this->Html->url(array("controller" => "People", "action" => "add")); ?>">Crear Persona</a></li>-->
                                <li><a href="<?= $this->Html->url(array("controller" => "Users", "action" => "registrar")); ?>">Crear Persona</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "People", "action" => "importarUsuarios")); ?>">registrar desde excel</a></li>
                                <!--<li><a href="<?= $this->Html->url(array("controller" => "Users", "action" => "buscador2")); ?>">Asociar Tarjeta a Persona</a></li>-->
                                <!--<li><a href="<?= $this->Html->url(array("controller" => "Users", "action" => "buscador")); ?>">Buscar Persona</a></li>-->
                                <li><a href="<?= $this->Html->url(array("controller" => "People", "action" => "buscador")); ?>">Buscar Persona</a></li>
                                <!--<li><a href="<?= $this->Html->url(array("controller" => "People", "action" => "buscar")); ?>">Asociar Tarjeta a Usuario</a></li>-->
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (in_array('autorizacion', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                        <li class="submenu"  > 
                            <a href="#">
                                <i class="icon icon-th-list"></i> 
                                <span>Gestionar Autorizacion</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "AuthorizationsUsers", "action" => "add")); ?>">Autorizar Usuarios</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (in_array('reportes', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                        <li class="submenu"  > 
                            <a href="#">
                                <i class="icon icon-fullscreen"></i> 
                                <span>Reportes</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "entradas", "action" => "reportes")); ?>">Reportes de Ingreso</a></li>
                            </ul>
                        </li>
                    <?php } ?> 
                    <?php if (in_array('commite', $this->Session->read('controlador')) || $this->Session->read('User.type_user_id') == 1) { ?>
                        <li class="submenu"  > 
                            <a href="#">
                                <i class="icon icon-th-list"></i> 
                                <span>Gestionar Comites</span>
                            </a>
                            <ul>
                                <li><a href="<?= $this->Html->url(array("controller" => "Committees", "action" => "add")); ?>">Crear comite</a></li>
                                <li><a href="<?= $this->Html->url(array("controller" => "CommitteesEventsPeople", "action" => "add")); ?>">Conformar comite</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?> 
        </div>
        <!--sidebar-menu-->
        <!--main-container-part-->
        <div id="content">
            <div class="container-fluid">
                <hr>
                <?php
                echo $this->Session->flash();
                ?>
                <?php echo $this->fetch('content'); ?>
            </div>

        </div>

        <!--end-main-container-part-->

        <!--Footer-part-->

        <div class="row-fluid">
            <!--  <div id="footer" class="span12">  <a href="http://themedesigner.in/">Themedesigner.in</a> </div> -->
        </div>




    </body>
</html>

