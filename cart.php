<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
session_start();  
include ("db_connection.php");

 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?> 

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tap To Know | Your Cart</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
        <li><a  href="index.php">home</a></li>
        <li><a href="#">shops</a></li>
        <li><a href="categories.php">categories</a></li>
        <li><a href="#">shop locator</a></li>
        <li><a href="about.php">about us</a></li>
        <li><a href="contact.php">contact</a></li>
        <li><a href="#">login</a></li>
        <li><a class="active" href="cart.php">cart</a></li>
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
        	<div class="panel">
             	<div class="title">
                	<h1 style="color:#6b2c05;">Your Cart</h1>
                </div>
            	<div class="content">

                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>
            		
                </div>

            </div>
        </div>
    </div><!----primary-col end-->
    <div class="right-section">
        <div class="clearing"></div>
        <div class="panel">
        	<div class="title">
            	
            	<h1>Our Team</h1>
            </div>
            <div class="content">
            	<ul>
                	<li><a href="#">Arshiful Islam Shadman </a></li>
                    <li><a href="#">Kazi Zawad Arefin</a></li>
                    <li><a href="#">Fatima Faheem Raadia</a></li>
                    
                </ul>
            </div>
        </div>
        <div class="right-section">
    	<div class="panel">
        	<div class="title">
            <h1>Mission </h1>
            </div>
            <div class="content">
            <p><span>To overcome the hassle individuals face when they go to vast shopping malls offering a
			wide array of products.</span><br/>
                    </p>
        </div>
    	</div>
		
			<div class="panel">
        	<div class="title">
            <h1>Vision </h1>
            </div>
            <div class="content">
            <p><span>Shopping will become more interactive. </span><br/>
                    </p>
        </div>
    	</div>
   
  </div>
        <div class="clearing"></div>
    </div>
    <!---right-section-end--->
</div> 
</div><!--- page wrapper div end -->
 
 <!--- page wrapper div end -->
 <div class="footer-wrapper">
 <div class="footer">
 <div class="panel marRight30">
 <div class="title">
 <h2>Tap To Know</h2>
 </div>
  
 
 </div>
 
 </div>
 </div>
 <!--- footer wrapper div end -->
</body>
</html>>