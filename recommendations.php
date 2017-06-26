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
<li><a href="home.php">home</a></li>
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
<div style="color:white; font-size:40px;"> Hello</div>
<p style="color:orange; font-size:35px;"><b>We will like to recommend you some most popular books</b></p>
 </div>
 


<div id="content_area">
<div id="shopping_cart">
<span style="float:right; font-size:18px ; padding:5px;line-height:40px;">Welcome guest!!!
<b style="color:yellow">Shopping Cart-</b>Total Items:  Total Price: <a href="cart.php" style="color:yellow"> Go To Cart</a>

</span>

</div>
 <div id="products_box">
 <?php

	$get_rec="select * from products where product_id IN (SELECT product_id FROM `bx-book-ratings` group by product_id order by avg(rating) desc)";
	$run_rec=mysqli_query($con,$get_rec);
	while($row_rec= mysqli_fetch_array($run_rec))
	{
		$rec_id=$row_rec['product_id'];
		$rec_title=$row_rec['product_title'];
		$rec_image=$row_rec['product_image_s'];
		echo " <div align='center' style='float:left; margin-left:20px; padding:10px; border:2px solid black; height:200px; width:200px; background-color:white;'>                       
       <h3 > $rec_title </h3>
	   <img src='$rec_image'  style='width:100px; height:100px; border:2px solid black'/>
        <a href='details.php?product_id=$rec_id' style='float:left';>Details</a>
		<a href='home.php.php?product_id=$rec_id'><button style='float:right'>Add To Cart</button></a>
		</div>     ";
}
?>
 </div> </div>

<div id="footer"><h2 style="text-align:center; padding-top:30px;">&copy; 2017 www.wizardworld.com</h2>  </div>


</div>


</div>




</body>
</html>






