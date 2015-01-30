<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Tiquetes</title>
		
		<?php
//        echo $this->Html->css(array('bootstrap', 'style', 'menuVertical'));
        echo $this->Html->css(array('bootstrap','styles'));
        
//        echo $this->Html->script(array('jquery.min', 'menu_jquery2', 'operaciones'));
        echo $this->Html->script(array('excanvas.min', 'jquery.min', 'operaciones', 'jquery.ui.custom', 'bootstrap', 'bootstrap-modal', 'jquery.flot.min', 'jquery.flot.resize.min', 'jquery.peity.min', 'fullcalendar.min'));
        
        
        ?>
	</head>
	<body>
<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Tiquets</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "registro")); ?>">Registrar</a></li>
        <li><a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "login")); ?>">Empresas</a></li>
        <li><a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "eventos")); ?>">Eventos</a></li>
        <li><a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "login2")); ?>">Personas</a></li>
        <li><a href="#contact">Reservar</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>

<div class="container">
  
  <?php
  echo $this->Session->flash();
  ?>

  <?php echo $this->fetch('content'); ?>
  
</div><!-- /.container -->
	</body>
</html>