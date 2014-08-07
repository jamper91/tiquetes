<!--<style type="text/css">
/*area#test
{
    fill: transparent;
    stroke:gray; /* Replace with none if you like 
    stroke-width: 4;
    cursor: pointer;
}*/

div.mapa_imagen {
  position: relative
}
ul.notas li {
  list-style: none;
  /*display: none;*/
  position: absolute;
  border: medium solid red;
  background: url("nada");
}
div.mapa_imagen:hover ul.notas li {
  display: block;
}
ul.notas li p {
  margin: 10px 0 0 0;
  padding: .3em;
  display: none;
  background: #FFF;
  opacity: 0.65;
  position: absolute;
  top: 100%;
}
ul.notas li:hover p {
  display: block;
}
 
ul.notas li#nota1 {
  width: 140px; height: 110px; top: 130px; left: 345px;
}
ul.notas li#nota2 {
  width: 30px; height: 200px; top: 10px; left: 10px;
}
ul.notas li#nota3 {
  width: 60px; height: 60px; top: 200px; left: 150px;
}
ul.notas li#nota4 {
  width: 60px; height: 60px; top: 0px; left: 0px;
}

ul.notas li#nota5{

	clip-path: polygon(0px 208px, 146.5px 207px, 147px 141.2px);
}
.mapa_imagen img{
	position: absolute;
	clip-path: polygon(0px 208px, 146.5px 207px, 147px 141.2px);
}


</style>-->


<!--<div class="mapa_imagen">
  <img src="<?php //echo $this->webroot.'/img/escenario/'.$stage["Stage"]["esce_mapa"] ?>" />
 
  <ul class="notas">
    <li id="nota1"><p>Todo el mar es suyo :)</p></li>
   <!-- <li id="nota2"><p>¡Me encanta este color azul!</p></li>
    <li id="nota3"><p>Dan ganas de tirarse...</p></li>
    <li id="nota4"><p>prueba</p></li>
    <li id="nota5"><p>prueba2</p></li>
  </ul>
</div>-->

<style type="text/css">
#contenedor {
   /*background-image:url(<?php //echo $this->webroot.'/img/escenario/'.$stage["Stage"]["esce_mapa"] ?>);*/
   /* background-size: 100% auto;*/
    background-repeat: no-repeat;
}

</style>


<img id="stage" src="<?php echo $this->webroot.'/img/escenario/'.$stage["Stage"]["esce_mapa"] ?>"  style="display:none"/>




<div id="contenedor" style="with:100%;">


</div>
<script type="text/javascript">
var img = document.getElementById('stage');
$("#contenedor").height($("#stage").height());

</script>

<script src='<?php echo $this->webroot?>/js/raphael-min.js'></script>
<script type="text/javascript">
/*window.onload = function(){
   var mesa = new Raphael(10, 15, 300, 400);
   var contenedor = document.getElementById('contenedor');
   var mesa = new Raphael(contenedor, 200, 100);
   mesa.attr({ fill: "#f03" });
}*/
var a=$("#contenedor").height();
var b=$("#contenedor").width();
var paper = Raphael(document.getElementById("contenedor"), b, a);
paper.setViewBox(0, 0, b, a, true);




paper.setSize('100%', '100%');
/*var svg = document.querySelector("svg");
svg.removeAttribute("width");
svg.removeAttribute("height");*/


   //create the image with the obtained width and height:
var image_1 = paper.image('<?php echo $this->webroot.'/img/escenario/'.$stage["Stage"]["esce_mapa"] ?>', 0, 0, b, a);



var triangulo =paper.path('M 50 0 L 100 100 L 0 100 Z').attr('fill', 'blue');
triangulo.click(function () {
        alert('first  clicked');
     });

var triangulo2 =paper.path('M 328 99 L 402 98 L 402 122 L 327 124 Z').attr('fill', 'blue');
triangulo2.click(function () {
        alert('first  clicked');
     });

var triangulo3 =paper.path('M 538 95 L 539 287 L 735 286 L 734 96 Z').attr('fill', 'blue');
triangulo3.click(function () {
        alert('first  clicked');
     });




function getPos(obj,e){
var evtobj=window.event? event : e;


clickX = evtobj.layerX;
clickY = evtobj.layerY;

alert('clickX:'+clickX+', clickY'+clickY);
}

$( '#contenedor' ).on( 'click', function( e ) {
    var x = e.pageX - this.offsetLeft;
    var y = e.pageY - this.offsetTop;
    getPos(this,e);

    console.log("X= "+x+" Y="+y);
});

/*var circle = paper.circle(100, 100, 50);
circle.attr({
    fill: 'url(http://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/SIPI_Jelly_Beans_4.1.07.tiff/lossy-page1-220px-SIPI_Jelly_Beans_4.1.07.tiff.jpg)'
});*/



</script>

<!--<img id="stage" src="<?php //echo $this->webroot.'/img/escenario/'.$stage["Stage"]["esce_mapa"] ?>" alt="led zeppelin" height="auto" width="auto" usemap="stage"/>-->


<!--<div id="bikenav">-->
<!--<canvas id="canvas">
<img id="stage" src="<?php //echo $this->webroot.'/img/escenario/'.$stage["Stage"]["esce_mapa"] ?>" alt="led zeppelin" height="auto" width="auto" usemap="stage"/>
</canvas>
<script type="text/javascript">

	//var c2 = canvas.getContext('2d');
	var canvas = document.getElementById("canvas");
	var c2 = canvas.getContext('2d');
	c2.fillStyle = '#f00';
	c2.beginPath();
	c2.moveTo(0, 0);
	c2.lineTo(100,50);
	c2.lineTo(50, 100);
	c2.lineTo(0, 90);
	c2.closePath();
	c2.fill();

</script>-->
<!--<img src="led.jpeg" alt="led zeppelin" usemap="#mapaAdrian"/>
        <map name="stage">
            <area href="#" id="test" alt="Jimmy Page..." title="Prueba"   
             shape="rect" coords="0, 0, 100, 100"   style="background: blue;"  />
        </map>  
</div>-->

<?php
echo "mapea";

echo "<pre>";
var_dump($stage);
echo "</pre>";

?>