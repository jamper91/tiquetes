
<div class="row">
  
<?php
//echo "<pre>";
//var_dump($eventos);
//echo "</pre>";


foreach ($eventos as $evento) { 
?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      
      <div class="caption">
        <h3><?=$evento['Event']['even_nombre']?></h3>
        <img src="<?php echo $this->webroot ?>/img/events1/<?=$evento['Event']['even_imagen1']?>" alt="">
        <p>...</p>
        <p>
        	<!--<a href="#" class="btn btn-primary" role="button">Ver detalles</a> -->
          	<a href="<?= $this->Html->url(array("controller" => "Pages", "action" => "localidadEvento/".$evento['Event']['id'])); ?>" class="btn btn-success" role="button">Localidades</a>
       </p>
      </div>
    </div>
  </div>



<?php
}
?>
</div>