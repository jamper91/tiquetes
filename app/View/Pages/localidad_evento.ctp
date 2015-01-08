<?php
echo "<h2>".$event["Event"]["even_nombre"]."</h2>";
echo "<h3>".$event["Stage"]["esce_nombre"]."</h3>";


?>
<img id="mapeos" src="<?php echo $this->webroot.'/img/escenario/'.$event["Stage"]["esce_mapa"] ?>" usemap="#esenario" >
<map id="image_map" name="esenario">

<?php
//$href='href="../a"';
	 foreach ($locations as $key => $value) {

    $location=$value["Location"];  ?>
  
<area  href="<?=$this->Html->url(array("controller" => "Pages", "action" => "verLocalidad/".$location['id']))?>"  full="<?=$location['loca_nombre']?>" shape="poly" coords="<?=$location['coord']?> " state="WL-<?=$location['id']?>"   ></area>
<?php }  ?>

</map>

<script type="text/javascript" src="http://www.outsharked.com/scripts/jquery.imagemapster.js"></script>

<script type="text/javascript">
var basic_opts = {
    mapKey: 'state'
};

var initial_opts = $.extend({},basic_opts, 
    { 
        staticState: true,
        fill: false,
        stroke: true,
        strokeWidth: 2,
        strokeColor: 'ff0000',
        isSelectable: false,
		singleSelect: true,
        //noHrefIsMask: false,
        onClick: go,

    });

function go(data){
	console.log("UNO");
	if (this.href && this.href !== '#') {
        window.open(this.href,'_self');
    }
}

$('img').mapster({
	fillOpacity: 0.5,
    //fillColor: "d42e16",
    isSelectable: false,
    singleSelect: true,
    stroke:true,
    strokeWidth: 2,
    strokeColor: 'ff0000',
    staticState:true,
    onClick: go,
});




/*
$('img').mapster(initial_opts)
    .mapster('set',true,'WL-0', {
        fill: true,
        fillColor: '00ff00',
        

    })
    .mapster('snapshot')
    .mapster('rebind',basic_opts);*/

</script>