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
<li><a href="index.php">Home</a></li>
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

<div id="sidebar" >
<div id="sidebar_title"><h5><b><u>Years Of Publication</u></b></h5></div>

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
 <div id="products_box"><?php getPro(); ?>
 <?php getYearPro(); ?>
 </div> </div>
<div id="footer"><h2 style="text-align:center; padding-top:30px;">&copy; 2017 www.bookworld.com</h2>  </div>


</div>


</div>




</body>
</html>
