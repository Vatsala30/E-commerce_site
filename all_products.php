<!DOCTYPE html>
<?php include('functions/functions.php') ?>
<html>
<head><title>My BookShop</title>
<link href="style.css" rel="stylesheet" media="all"/>
</head>
<body>
<div class="main_wrapper">

<div class="header_wrapper"> 
<img id="logo" src=""/>
<h1>Book World!</h1>

</div>
<div class="menubar" > 
<ul id="menu">
<li><a href="home.php">Home</a></li>
<li><a href="all_products.php">All Products</a></li>
<li><a href="account.php">My Account</a></li>
<li><a href="#">Sign Up</a></li>
<li><a href="#">Shopping Cart</a></li>
<li><a href="#">Contact Us</a></li>
</ul>

<div id="form">
 <form method="get" action="results.php">
 <input type="text" name="user_query" placeholder="Search your product"/>
 <input type="submit" name="search" value="search"/>
 </form>
 </div>

 </div>
 
 
<div class="content_wrapper">

<div id="sidebar" >
<div id="sidebar_title"><h5>Years Of Publication</h5></div>

<ul id="years">
<?php getYear();?>
</ul>

 </div>


<div id="content_area">
<div id="shopping_cart">
<span style="float:right; font-size:18px ; padding:5px;line-height:40px;">Welcome guest!!!
<b style="color:yellow">Shopping Cart-</b>Total Items:  Total Price: <a href="cart.php" style="color:yellow"> Go To Cart</a>

</span>

</div>
 <div id="products_box">
 <?php
 $get_pro="select * from products";
	$run_pro=mysqli_query($con , $get_pro);
	while($row_pro= mysqli_fetch_array($run_pro))
	{
		$pro_id=$row_pro['product_id'];
		$pro_title=$row_pro['product_title'];
		$pro_author=$row_pro['product_author'];
		$pro_year=$row_pro['product_year'];
		$pro_publisher=$row_pro['product_publisher'];
		$pro_image_s=$row_pro['product_image_s'];
		$pro_image_m=$row_pro['product_image_m'];
		$pro_image_l=$row_pro['product_image_l'];
		echo " <div align='center' style='float:left; margin-left:20px; padding:10px; border:2px solid black; height:200px; width:200px; background-color:white;'>                       
       <h4 > $pro_title </h4>
       <img  src='$pro_image_s' style='width:150px; height:150px; border:2px solid black;' />
        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
		<a href='home.php?pro_id=$pro_id'><button style='float:right;'>Add To Cart</button></a>
		</div>     ";
}?>
 </div> </div>

<div id="footer"><h2 style="text-align:center; padding-top:30px;">&copy; 2017 www.wizardworld.com</h2>  </div>


</div>


</div>




</body>
</html>
