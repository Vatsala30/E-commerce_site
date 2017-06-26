<!DOCTYPE html>
<?php include('functions/functions.php') ?>
<html>
<head><title>My BookShop</title>
<link href="style.css" rel="stylesheet" media="all"/>
<link href='//fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
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
<?php
if(isset($_POST['submit'])){
$name=$_POST['user_name'];}
?>
<div id="sidebar" >

<div style="color:white ;font-family: 'Kavoon';font-size: 40px; text-align:center; margin-top:30px;"><?php echo "Hello"."  ".$name; ?></div>
<p style="color:orange; font-size:35px; margin-top:50px; text-align:center;"> We will like to recommend these books to you. Go to 'all products' for more items.</p> 

 </div>
 


<div id="content_area">
<div id="shopping_cart">
<span style="float:right; font-size:18px ; padding:5px;line-height:40px;">Welcome guest!!!
<b style="color:yellow">Shopping Cart-</b>Total Items:  Total Price: <a href="cart.php" style="color:yellow"> Go To Cart</a>

</span>

</div>
 <div id="products_box">
 <?php
 if(isset($_POST['submit'])){
	 $name=$_POST['user_name'];
     require_once("recommend.php");
     require_once("sample_list.php");
//require_once("sample_pref.php");
     $rec_books=array();
     $re = new Recommend();

    $rec_books=$re->getRecommendations($books, $name);
//print_r($rec_books);
foreach($rec_books as $book=>$rate)
{
	
	$get_pro="select * from demo_product where product_title='$book'";
	$run_pro=mysqli_query($con , $get_pro);
	while($row_pro= mysqli_fetch_array($run_pro))
	{
		$pro_id=$row_pro['product_id'];
		$pro_title=$row_pro['product_title'];
		$pro_author=$row_pro['product_author'];
		$pro_year=$row_pro['product_year'];
		$pro_publisher=$row_pro['product_publisher'];
		$pro_image=$row_pro['product_image'];
		
		
		echo " <div align='center' style='float: left; margin-left:10px; margin-right:10px;margin-top:5px;margin-bottom:5px; padding:10px; border:0.5px solid black; height:200px; width:200px; background-color:white'>                       
       <h4> $pro_title </h4>
	   <img  src='$pro_image' width='100' height='100' style='border:2px solid black' />
        <a href='details_demo.php?product_id=$pro_id' style='float:left'>Details</a>
		<a href='home.php?product_id=$pro_id'><button style='float:right'>Add To Cart</button></a>
		</div>     ";
 }}}
?>
 </div> </div>

<div id="footer"><h2 style="text-align:center; padding-top:30px;">&copy; 2017 www.wizardworld.com</h2>  </div>


</div>


</div>




</body>
</html>