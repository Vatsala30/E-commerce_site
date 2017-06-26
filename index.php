<?php  
 $connect = mysqli_connect("localhost", "root", "", "new_ecommerce");  
 $query = "SELECT Age,count(*) as Number FROM `bx-users` where Age >0 group by Age";  
 $result = mysqli_query($connect, $query);  
// while($row=mysqli_fetch_array($result))
// {
//	echo "Age ".$row['Age']." "." Number".$row['Number'];
 //}
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
<title>My BookShop</title>
<link href="style.css" rel="stylesheet" media="all"/>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Age', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Age"]."', ".$row["Number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Buyers from all age groups',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
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
 <div id="sidebar" >
<p style="color:orange; font-size:45px; text-align:center;"><b>A<br/> World<br/> Full Of Books<br/> Popular<br/> In The Whole World<br/></b></p>

 </div>
 <div id="content_area">
  
             
           <br /><br />  
           <div style="width:796px; background-color:orange">  
                <h1 align="center" style="color: white; font-family: Comic Sans MS;">A Store Which Has Something For All !!! </h1>  
                <br />  
                <div id="piechart" style="width: 796px; height: 500px; border: 2px inset orange;"></div>  
           </div> 
</div><div id="footer"><h2 style="text-align:center; padding-top:30px;">&copy; 2017 www.bookworld.com</h2>  </div>	</div></div>	   
      </body>  
 </html>  