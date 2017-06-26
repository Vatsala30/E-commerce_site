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
<li><a href="recommendations.php">Recommendations</a></li>
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

<div id="sidebar">

 </div>
 


<div id="content_area">
<div id="shopping_cart">
<span style="float:right; font-size:18px ; padding:5px;line-height:40px;">Welcome guest!!!
<b style="color:yellow">Shopping Cart-</b>Total Items:  Total Price: <a href="cart.php" style="color:yellow"> Go To Cart</a>

</span>

</div>
 <div id="products_box_new" width :800px><?php if(isset($_GET['product_id'])){
	 $product_id=$_GET['product_id'];
	 $get_pro="select * from products where product_id='$product_id'";
	$run_pro=mysqli_query($con , $get_pro);
	while($row_pro= mysqli_fetch_array($run_pro))
	{
		$pro_id=$row_pro['product_id'];
		$pro_title=$row_pro['product_title'];
		$pro_image=$row_pro['product_image_l'];
		$pro_author=$row_pro['product_author'];
	    $pro_year=$row_pro['product_year'];
		$pro_publisher=$row_pro['product_publisher'];
		
		
		echo " <div align='center' style='float: left; margin-left:10px; margin-right:10px;margin-top:5px;margin-bottom:5px; padding:10px; border:0.5px solid black; background-color:white; width:400px;'>                       
       <h2> $pro_title </h2>
	   <b><p>$pro_author</p><b><br/>
	   <b><p>$pro_year</p><b><br/>
	   <img  src='$pro_image'  style='border:2px solid black' />
	   <b><p>Publisher: $pro_publisher</p></b>
		<a href='home.php?product_id=$pro_id'><button style='float:right'><b>Add To Cart</b></button></a>
		<a href='home.php'><button style='float:left'><b>Go back</b></button></a>
		</div>     ";
 }}?></div> </div>

<div id="footer"><h2 style="text-align:center; padding-top:30px;">&copy; 2017 www.bookworld.com</h2>  </div>


</div>


</div>




</body>
</html>
