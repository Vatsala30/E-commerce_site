
<?php

$con = mysqli_connect("localhost","root","","new_ecommerce");
if (!$con) {
    die('Server connection problem: ' . msql_error());
}





function getPro()
{	if(!isset($_GET['year'])){
	global $con;
	$get_pro="select * from products order by RAND() LIMIT 0,18";
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
		
		echo " <div align='center' style='float: left; margin-left:10px; margin-right:10px;margin-top:5px;margin-bottom:5px; padding:10px; border:0.5px solid black; height:200px; width:200px; background-color:white'>                       
       <h4> $pro_title </h4>
	   <img  src='$pro_image_s' width='100' height='100' style='border:2px solid black' />
        <a href='details.php?product_id=$pro_id' style='float:left'>Details</a>
		<a href='index.php?product_id=$pro_id'><button style='float:right'>Add To Cart</button></a>
		</div>     ";
}}}
function getYear()
{
	global $con;
$get_year = "select distinct product_year from products order by product_year desc";
$run_year=mysqli_query($con, $get_year);
while($row_year = mysqli_fetch_array($run_year))
{	
  $year=$row_year['product_year'];
echo "<li><a href='index.php?year=$year'>$year</a></li>";
}
}
function getYearPro()
{
	if(isset($_GET['year'])){
	$year_id= $_GET['year'];
	
	global $con;
	$get_year_pro="select * from products where product_year='$year_id'";
	
	$run_year_pro=mysqli_query($con , $get_year_pro);
	$count_years=mysqli_num_rows($run_year_pro);
	if($count_years==0)
	{
		echo"<h2 style='padding:20px'> There is no book published in this year</h2>";
	}
	
	while($row_year_pro= mysqli_fetch_array($run_year_pro))
	{
		$pro_id=$row_year_pro['product_id'];
		$pro_title=$row_year_pro['product_title'];
		$pro_image=$row_year_pro['product_image_s'];
		$pro_year=$row_year_pro['product_year'];
		
		echo " <div align='center' style='float: left; margin-left:10px; margin-bottom:2px;padding:5px; border:0.5px solid black; height:220px; width:220px; background-color:white;' >                       
       <h4 > $pro_title </h4>
       <img  src='$pro_image'  style='width:150px; height:150px; border:2px solid black;' />
        <a href='details.php?product_id=$pro_id' style='float:left;'>Details</a>
		<a href='index.php?product_id=$pro_id'><button style='float:right;'>Add To Cart</button></a>
		</div>     ";
		
}
}}
function getRecPro()
{
	global $con;
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
        <a href='customer/details.php?product_id=$pro_id' style='float:left'>Details</a>
		<a href='index.php?product_id=$pro_id'><button style='float:right'>Add To Cart</button></a>
		</div>     ";
}
}



?>