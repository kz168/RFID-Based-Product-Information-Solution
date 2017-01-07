<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
include ("db_connection.php");
$there=$_POST['there'];
$here=$_POST['here'];

$query="SELECT latVal,lngVal FROM map_data WHERE id={$here}";
$query_exec=mysqli_query($dbcon,$query);
if($query_exec){
  while($row=$query_exec->fetch_object()){
    $here_latVal=$row->latVal;
    $here_lngVal=$row->lngVal;
  }
}


$query2="SELECT map_data FROM shop_table WHERE id={$there}";
$query_exec2=mysqli_query($dbcon,$query2);
if($query_exec2){
  while($row=$query_exec2->fetch_object()){
    $map_data_id=$row->map_data;
    
  }
}

$query3="SELECT latVal,lngVal FROM map_data WHERE id={$map_data_id}";
$query_exec3=mysqli_query($dbcon,$query3);
if($query_exec3){
  while($row=$query_exec3->fetch_object()){
    $there_latVal=$row->latVal;
    $there_lngVal=$row->lngVal;
    
  }
}

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tap To Know | MAP</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<!--for new marker-->
<link rel="stylesheet" href="css/leaflet.awesome-markers.css">

 <!--- for map include these -->
<link rel="stylesheet" href="http://npmcdn.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />

 <!--- for map include these - end-->
 <style>

#map { width: 600px; height: 400px; }

</style>
 <script>
 L.Map = L.Map.extend({
    openPopup: function (popup, latlng, options) { 
        if (!(popup instanceof L.Popup)) {
        var content = popup;

        popup = new L.Popup(options).setContent(content);
        }

        if (latlng) {
        popup.setLatLng(latlng);
        }

        if (this.hasLayer(popup)) {
        return this;
        }

        // NOTE THIS LINE : COMMENTING OUT THE CLOSEPOPUP CALL
        //this.closePopup(); 
        this._popup = popup;
        return this.addLayer(popup);        
    }
});
 </script>

 <script src="js/leaflet.awesome-markers.js"></script>
 </head>



<body>

<div class="wrapper">
<div class="top-strip ">
  <div class="top-strip-cor1"></div>
  <div class="top-strip-cor2"></div>
  <div class="top-strip-cor3"></div>
  <div class="top-strip-cor4"></div>
  <div class="logo">
      
      <h1>TapToKnow</h1>
      <h2>Making shopping fun and easy</h2>
  </div>
  <div class="search-panel">
    <div class="search-panel-cor1"></div>
    <div class="search-panel-cor2"></div>
    <div class="search-box">
      <input name="" type="text" class="search-box-input"  value="search here"/>
      <div class="search-icon"></div>
    </div>
  </div>
  <div class="clearing"></div>
  <div class="menu padTop b-top ">
    
    <ul>
        <li><a href="index.php">home</a></li>
        <li><a href="shops.php">shops</a></li>
        <li><a href="categories.php">categories</a></li>
        <li><a class="active" href="#">shop locator</a></li>
        <li><a href="about.php">about us</a></li>
        <li><a href="contact.php">contact</a></li>
        <li><a href="#">login</a></li>
      </ul>
  </div>
  <div class="clearing"></div>
</div>
<div class="clearing"></div>
<!--- top strip div end -->
  
  <!--- panel wrapper div end -->
<div class="page-wrapper">
 
 <div class="page">
	<div class="primary-col">
    	<div class="generic">
        	<div class="services">
             	<div class="title">
                	<h1>MAP</h1>
                </div>
            	<div class="content">


     <div class="panel">           

      <div id="map"></div>
      <script src="http://npmcdn.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>
      <script>
        var layer;
      
        var mapMinZoom = 0;
        var mapMaxZoom = 5;
        var map = L.map('map', {
          maxZoom: mapMaxZoom,
          minZoom: mapMinZoom,
          crs: L.CRS.Simple
        }).setView([0, 0], mapMaxZoom);
        
        var mapBounds = new L.LatLngBounds(
            map.unproject([0, 5120], mapMaxZoom),
            map.unproject([3584, 0], mapMaxZoom));
            
        map.fitBounds(mapBounds);
        layer = L.tileLayer('{z}/{x}/{y}.png', {
          minZoom: mapMinZoom, maxZoom: mapMaxZoom,
          bounds: mapBounds,
          attribution: 'Rendered with <a href="http://www.maptiler.com/">MapTiler</a>',
          noWrap: true,
          tms: false
        }).addTo(map);

        var marker=L.marker(["<?php echo $here_latVal;?>","<?php echo $here_lngVal;?>"],{
            draggable:true,
           }).addTo(map);
        marker.bindPopup('<b>You are here!</b>').openPopup();

        var marker=L.marker(["<?php echo $there_latVal;?>","<?php echo $there_lngVal;?>"],{
            draggable:true,
           }).addTo(map);

        marker.bindPopup('<b><?php echo $shop_name;?> Entrance</b>').openPopup();      
      
    </script>
      
    
  
    </div>







</body>
</html>