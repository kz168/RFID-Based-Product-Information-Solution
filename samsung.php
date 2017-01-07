<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tap To Know | Samsung</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<!--for new marker-->
<link rel="stylesheet" href="css/leaflet.awesome-markers.css">

 <!--- for map include these -->
<link rel="stylesheet" href="http://npmcdn.com/leaflet@1.0.0-rc.3/dist/leaflet.css" />
<script src="http://npmcdn.com/leaflet@1.0.0-rc.3/dist/leaflet.js"></script>
 <!--- for map include these - end-->

 


</head>



<body onload="init()">

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
        <li><a class="active" href="shops.php">shops</a></li>
        <li><a href="categories.php">categories</a></li>
        <li><a href="#">shop locator</a></li>
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
                	<h1>Electronics _ Samsung</h1>
                </div>
            	<div class="content">


     <div class="panel">
      <div class="title">
        <h2>Browse through all the shops selling electrical devices and appliances, at Jamuna Future Park </h2>
      </div>






      <div class="content mar-top30"> 
      <img src="images/samsung-galaxy-s6-edge-3.jpg" width="200" height="200" />
        <h2>Samsung S7 E d g e </h2>
        <p>You can’t live without water or your smartphone, which is why the Galaxy S7 and Galaxy S7 edge have a certified water-resistant rating </p>
        <p> ** Special Features include 3G, 5.1″ Super AMOLED capacitive touchscreen, 16 MP camera,</p>
        <p>Price - BDT 68, 500/-</p>
      </div>

      <div class="clearing"></div>
      <div class="clearing"></div>

      <div class="content mar-top30"> 
      <img src="images/note7.jpg" width="200" height="200" />
        <h2>Samsung Galaxy N o t e - 7 </h2>
        <p>Corning Gorilla Glass 5 black panel. </p>
        <p>Micro SD, upto 256GB, Dual sim model. </p>
        <p>Price - BDT 54, 700/-</p>
      </div>
      
      <div class="clearing"></div>
      
      <div class="clearing"></div>




      <div id="map" style="width: 600px; height: 400px"></div>
      <!--<script src="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.js"></script>-->
      <script src="js/leaflet.awesome-markers.js"></script>
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


        var marker=L.marker([0,0],{
            draggable:true,
           }).addTo(map);

        marker.bindPopup('<b>You are here!</b>').openPopup();
        marker.on('dragend', function(ev) {
    //alert(ev.latlng); // ev is an event object (MouseEvent in this case)
    marker.getPopup().setContent('Clicked ' + marker.getLatLng().toString()+'</br>'+' pxl '+map.project(marker.getLatLng(),map.getMaxZoom().toString())).openOn(map);
});
      }


      
      L.marker([1,-10], {icon: L.AwesomeMarkers.icon({markerColor: 'red'}) }).addTo(map);
    </script>
    
  
    </div>





<p> </p>
<p> </p><p> </p><p> </p><p> </p>


</body>
</html>