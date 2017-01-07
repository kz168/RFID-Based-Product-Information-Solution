<!DOCTYPE html>
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

<html>
  <head>
    <title>MAP</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="css/leaflet.css" />
    <script src="js/leaflet.js"></script>
    <script>
      var layer;
      function init() {
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
        }    
    </script>
    <style>
      html, body, #map { width:100%; height:100%; margin:0; padding:0; z-index: 1; }
      #slider{ position: absolute; top: 10px; right: 10px; z-index: 5; }
    </style>
  </head>
  <body onload="init()">
    <div id="map"></div>
    <input id="slider" type="range" min="0" max="1" step="0.1" value="1" oninput="layer.setOpacity(this.value)">
  </body>
</html>
