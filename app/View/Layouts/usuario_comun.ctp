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
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <?php
        echo $this->Html->css(array('bootstrap', 'style', 'menuVertical'));
        echo $this->Html->script(array('jquery.min', 'menu_jquery2', 'operaciones'));
        ?>
        <!--        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!--<script src="js/jquery.min.js"></script>-->
        <!-- Custom Theme files -->
        <!--<link href="css/style.css" rel='stylesheet' type='text/css' />-->
        <!--<link rel='stylesheet' type='text/css' href='css/menu.css' />-->
<!--        <script type='text/javascript' src='js/menu_jquery.js'></script>-->
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script>
//            $(document).ready(function() {
//                $("#cssmenu a").click(function(e) {
//                    e.preventDefault();
//                    $("#contenido").load($(this).attr("href"));
//                });
//                $("#contenido").on("submit", "form", function(e) {
//                    e.preventDefault();
//                    var url = $(this).attr("action");
//                    $.post(url, $(this).serialize()).done(function(data) {
//                        var url2 = url.substring(0, url.length - 3);
//                        $("#contenido").load(url2);
//                    });
//                });
//                $("#contenido").on("click", "a", function(e) {
//                    e.preventDefault();
//                    var url = $(this).attr("href");
//                    var url2 = $(this).attr("redi");
//                    var tipo = $(this).attr("tipo");
//                    if (tipo !== "borrar")
//                        $("#contenido").load(url);
//                    else {
//                        ajax(url, null, function(xml) {
//
//                            $("#contenido").load(url2);
//                        });
//                    }
//
//                });
//            });

        </script>
        <!----webfonts---->
        <link href='http://fonts.googleapis.com/c ss?family=Exo+2:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="header_top">
                    <h1><?php // echo $this->Html->link($cakeDescription, 'http://cakephp.org');                      ?></h1>
                    <?php // echo $this->Session->flash(); ?>


                    <ul class="social">
                        <li><a href=""> <i class="tw"> </i> </a></li>
                        <li><a href=""><i class="fb"> </i> </a></li>
                        <li><a href=""><i class="rss"> </i> </a></li>
                        <li><a href=""><i class="msg"> </i> </a></li>
                        <div class="clearfix"> </div>
                    </ul>
                    <ul class="account">
                        <li><a href="#">aqui poner login en ventana emergente</a></li>
                    </ul>
                    <ul class="shopping_cart">
                        <a href="#"><li class="shop_left"><i class="cart"> </i><span>Shop</span></li></a>
                        <a href="#"><li class="shop_right"><span>$0.00</span></li></a>
                        <div class="clearfix"> </div>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="header_bottom">
                    <div class="header_nav">
                        <div class="logo">
                            <a href="index.html">
                                <!--<img src="images/logo.png" alt=""/>-->
                                <?php echo $this->Html->image("logo.png", array()); ?>
                                <br></a>
                        </div>
                        <nav class="navbar navbar-default menu" role="navigation"><h3 class="nav_right"><a href="index.html">
                                    <!--<img src="images/logo.png" class="img-responsive" alt=""/>-->
                                    <?php echo $this->Html->image("logo.png", array('class' => 'img-responsive')); ?>

                                </a></h3>
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                            </div><!-- /.container-fluid -->
                        </nav>
                        <div class="clearfix"></div>
                    </div>            
                </div>  
            </div>
        </div>
        <div class="main">
            <div class="container">		   
                <div class="row content">
<!--                    <div class="col-md-3" id="cssmenu">
                        <h3><?php echo __('Menú Principal'); ?></h3>
                        <ul>
                            <li><font color="white">&numsp;</font></li>
                            <li class="has-sub" ><a><span>Ubicación Geográfica</span></a>
                                <ul>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "countries", "action" => "index")); ?>">
                                            Listar Paises
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "countries", "action" => "add")); ?>">
                                            Crear Pais
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "departments", "action" => "index")); ?>">
                                            Listar Departamentos
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "departments", "action" => "add")); ?>">
                                            Crear Departamento
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "cities", "action" => "index")); ?>">
                                            Listar Ciudades
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "cities", "action" => "add")); ?>">
                                            Crear Ciudad
                                        </a> 
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub"><a><span>Usuarios</span></a>
                                <ul>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "typeusers", "action" => "index")); ?>">
                                            Listar Tipos de Usuario
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "typeusers", "action" => "add")); ?>">
                                            Crear Tipo de Usuario
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "users", "action" => "index")); ?>">
                                            Listar Usuarios
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "users", "action" => "add")); ?>">
                                            Crear Usuario
                                        </a> 
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub"><a><span>Permisos</span></a>
                                <ul>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "authorizations", "action" => "index")); ?>">
                                            Listar Permisos
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "authorizations", "action" => "add")); ?>">
                                            Crear Permiso
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "authorizationsusers", "action" => "index")); ?>">
                                            Listar Permisos por Usuario
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "authorizationsusers", "action" => "add")); ?>">
                                            Agregar Permiso a Usuario
                                        </a> 
                                    </li>
                                </ul>
                            </li>                            
                            <li class="has-sub"><a><span>Eventos</span></a>
                                <ul>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "stages", "action" => "index")); ?>">
                                            Listar Escenario
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "stages", "action" => "add")); ?>">
                                            Crear Escenario
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "events", "action" => "index")); ?>">
                                            Listar Eventos
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "events", "action" => "add")); ?>">
                                            Crear Evento
                                        </a> 
                                    </li>                                    
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "activties", "action" => "index")); ?>">
                                            Listar Funciones por Evento
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "activities", "action" => "add")); ?>">
                                            Crear Función para Evento
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "events", "action" => "index")); ?>">
                                            Copiar Función a Evento
                                        </a> 
                                    </li>
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "committees", "action" => "index")); ?>">
                                            Listar Comite por evento
                                        </a> 
                                    </li>                                    
                                    <li><a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "committees", "action" => "add")); ?>">
                                            Crear Comite para Evento
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "companies_events", "action" => "add")); ?>">
                                            Asociar empresas a Eventos
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "events_registration_types", "action" => "add")); ?>">
                                            asociar tipo de inscripcion a evento
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "events_hotels", "action" => "add")); ?>">
                                            Asociar hoteles a un evento
                                        </a> 
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub"><a><span>Otros</span></a>
                                <ul>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "registration_types", "action" => "add")); ?>">
                                            Crear tipo de registro
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "registration_types", "action" => "index")); ?>">
                                            Listar tipos de registro
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "payments", "action" => "add")); ?>">
                                            Crear medio de pago
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "payments", "action" => "index")); ?>">
                                            Listar medios de pago
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "companies", "action" => "add")); ?>">
                                            Crear empresa
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "companies", "action" => "index")); ?>">
                                            Listar empresa
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "registration_types", "action" => "add")); ?>">
                                            crear tipo de inscripcion
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "registration_types", "action" => "index")); ?>">
                                            Listar tipo de inscripcion
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "input_states", "action" => "add")); ?>">
                                            Crear estados de entrada
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "input_states", "action" => "index")); ?>">
                                            Listar estados de entrada
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "delivery_methods", "action" => "add")); ?>">
                                            Crear metodo de entrega
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "delivery_methods", "action" => "index")); ?>">
                                            Listar metodos de entrega
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "hotels", "action" => "add")); ?>">
                                            Crear hotel
                                        </a> 
                                    </li>
                                    <li>
                                        <a id="lnkDepa" href="<?php echo $this->Html->url(array("controller" => "hotels", "action" => "index")); ?>">
                                            Listar hoteles
                                        </a> 
                                    </li>
                                </ul>
                            </li>                                                        
                        </ul>
                    </div>-->

                    <div >                        
                        <div id="contenido">
                            <?php echo $this->fetch('content'); ?>
                        </div>                        
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">			
            <div class="clearfix"> </div>
            <div class="copy">
                <p>&copy; 2014 Por EnovaSoft Ingenier&iacute;a LTDA.</p>
            </div>
        </div>
    </div>
    <?php echo $this->element('sql_dump'); ?>
</body>
</html>

