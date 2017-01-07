<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
session_start();
include ("db_connection.php");
$cid=$_GET['cid'];

$query="SELECT category_name FROM shop_category WHERE id={$cid}";
$query_exec=mysqli_query($dbcon,$query);
if($query_exec){
  while($row=$query_exec->fetch_object()){
    $category_name=$row->category_name;
  }
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tap To Know | List of Shops</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
        <li><a class="active" href="shops.php">shops</a></li>
        <li><a href="categories.php">categories</a></li>
        <li><a href="#">shop locator</a></li>
        <li><a href="about.php">about us</a></li>
        <li><a href="contact.php">contact</a></li>
        <li><a href="#">login</a></li>
        <li><a href="cart.php">cart</a></li>
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
                  <h1><?php echo $category_name;?> Shops</h1>
                </div>
              <div class="content">


     <div class="panel">
      <div class="title">
        <h2>Browse through all the shops!</h2>
      </div>



          <?php
           if( $result=$dbcon->query("SELECT * FROM shop_table WHERE shop_category={$cid}"))
           {
             while($row=$result->fetch_object())
             {             
           ?>
      <div class="content mar-top30"> 
      <a href="shop.php?sid=<?php echo $id=$row->id;?>"><img src="<?php echo $id=$row->image; ?>" width="200" height="200" /></a>
        <h2><a href="shop.php?sid=<?php echo $id=$row->id;?>"><?php echo $id=$row->shop_name; ?></a></h2>
        <p><?php echo $id=$row->description;?></p>
      </div>
      <div class="clearing"></div>
      <div class="clearing"></div>
      <?php
      }
      $result->free();
      }
      ?>

      
      
      
    </div>



<p> </p>
<p> </p><p> </p><p> </p><p> </p>

</body>
</html>