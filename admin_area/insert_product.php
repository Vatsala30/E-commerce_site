<!DOCTYPE html>
<?php include("includes/db.php");?>
<html>
<head>
<title> Iserting Products</title>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="skyblue">
<form action="insert_product.php" method="post" enctype="multipart/form-data">
   <table align="center" width="650" border="2px" bgcolor="orange" >
   <tr align="center">
   <td colspan="7"><h2>Insert Product Here</h2></td>
   </tr>
   <tr>
   <td align="center"><b>Product ID</b></td>
   <td> <input type="text" name="product_id" size="60"/ required> </td>
   </tr>
   <tr>
   <td align="center"><b>Product Title</b></td>
   <td> <input type="text" name="product_title" size="60"/ required> </td>
   </tr>
    <tr>
   <td align="center"><b>Product Author</b></td>
   <td> <input type="text" name="product_author" size="60"/ required> </td>
   </tr>
    <tr>
   <td align="center"><b>Year Of Publication</b></td>
   <td> <select name="product_year" required>
   <option>Select a year</option>
   <?php
     $get_year = "select product_year from products";
$run_year=mysqli_query($con, $get_year);
while($row_year = mysqli_fetch_array($run_year))
{	
  $year_id=$row_year['product_year'];
echo "<option value='$year_id'> $year_id</option>";
}
    ?>
   </select>
   </td>
   
   </tr>
   <tr>
   <td align="center"><b>Product Small Image</b></td>
   <td> <input type="text" name="product_image_s"/ required> </td>
   </tr>
   <tr>
   <td align="center"><b>Product Medium Image</b></td>
   <td> <input type="text" name="product_image_m"/ required> </td>
   </tr>
   <tr>
   <td align="center"><b>Product Large Image</b></td>
   <td> <input type="text" name="product_image_l"/ required> </td>
   </tr>
    <tr>
   <td align="center"><b>Product Price</b></td>
   <td> <input type="text" name="product_price"/ required> </td>
   </tr>
    <tr>
   <td align="center"><b>Product Publisher</b></td>
   <td> <textarea name="product_publisher" cols="30" rows="5" > </textarea></td>
   </tr>
   
    <tr align="center">
   
   <td colspan="7"><b> <input type="submit" name="insert_post" value="Insert"/></b> </td>
   </tr>
   
   </table>

</body>
</html>
<?php 
if(isset($_POST['insert_post']))
{
//getting text data from fields
$product_id=$_POST['product_id'];
$product_title=$_POST['product_title'];
$product_year=$_POST['product_year'];	
$product_price=$_POST['product_price'];
$product_author=$_POST['product_author'];
$product_publisher=$_POST['product_publisher'];
$product_image_s=$_POST['product_image_s'];
$product_image_m=$_POST['product_image_m'];
$product_image_l=$_POST['product_image_l'];
//getting the image from the fields
//$product_image=$_FILES['product_image']['name'];
//$product_image_tmp=$_FILES['product_image']['tmp_name'];

//move_uploaded_file($product_image_tmp,"product_images/$product_image");

 $insert_product="insert into products (product_id,product_title,product_author,product_year,product_publisher,product_image_s,product_image_m,product_image_l,product_price) values('$product_id','$product_title','$product_author','$product_year','$product_publisher','$product_image_s','$product_image_m','$product_image_l','$product_price')";
 $insert_pro = mysqli_query($con , $insert_product);
 if($insert_pro)
 {
	 echo " <script>alert('Product has been inserted')</script>";
	 echo "<script>window.open('insert_product.php','_self')</script>";
 }
}
?>