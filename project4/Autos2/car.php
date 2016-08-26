<style> table, td, caption { border: 2px solid blue ; padding: 10px; color: white ; } </style>
<style> td { border: 1px solid green ; color: white ; } </style>
<style> caption { color: white ; } </style>



<?php
  
  tables();
 
  
  
include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );

mysql_select_db( $project ); 
echo "<font color='red'>connected</font>";




if (isset($_POST['B1'])){

	insert();}
 
  function insert(){

$ID=$_POST['carID'];
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];

$s="INSERT INTO Inventory VALUES ('$name','$ID','$quantity','$price') "; 
print "<br>$s<br><br>";

//1. Get table $t
if( $t = mysql_query ( $s  ) ) {
print "<font color='red'><br> Query inserted <br></font>";}

else {
		echo "<font color='red'>MySQL Error:</font>" . mysql_error(); 
	 }	



}


if (isset($_POST['B2'])){

	remove();}
	
function remove (){


$ID=$_POST['carID'];
$name=$_POST['name'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];

$s= "DELETE FROM Inventory 
WHERE PersonName='$name' AND CarID='$ID' AND Quantity='$quantity' AND price=$price";

print "<font color='red'><br>$s<br><br></font>";

//1. Get table $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );


print "<font color='red'><br>Query is REMOVED!<br></font>";
}


if (isset($_POST['B3'])){

	All();}
	
	echo '
	</div>
	</body>
	</html>';
	
function All (){

$s= "SELECT * FROM Inventory";  


//1. Get table $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );
print "<font color='red'><br> Query inserted <br></font>";


//2. Get rows $r
print "<table>";
 
print "<caption>";
print "Inventory";
print "</caption>";

print "<tr> <td>PersonName</td> <td>CarID</td> <td>Quantity</td>  <td>Price</td></tr>";
while (   $r = mysql_fetch_array($t) )
{ 
	print "<tr>";
		print " <td>";
		print $r["PersonName"];
	print "</td>";
		print "<td>";
		print $r["carID"];
	print "</td>";
	print " <td>";
		print $r["Quantity"];
	print "</td>";
		print " <td>";
		print $r["price"];
	print "</td>";
	
	print  " </tr>";
		
}
	print " </table>";


}

function tables () {


echo '	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title>Misdirected Deliveries,Inc.</title> 
<style type="text/css"> 

 
 #navbar ul {  
	margin: 0; 
	padding: 5px; 
	list-style-type: none; 
	text-align: center; 
	background-color: #000; 
	} 
 
#navbar ul li {  
	display: inline; 
	} 
 
#navbar ul li a { 
	text-decoration: none; 
	padding: .2em 1em; 
	color: #fff; 
	background-color: #000; 
	} 
 
#navbar ul li a:hover { 
	color: #000; 
	background-color: #fff; 
	} 
 

</style> 
</head> 
<body  bgcolor="#000000"> 
<div id="navbar"> 
  <ul> 
	<li><a href="homepage.html">Home</a></li> 
	<li><a href="company.html">Company</a></li> 
	<li><a href="customer.html">Customers</a></li> 
	<li><a href="Inventory.html">Inventory</a></li> 
	<li><a href="Invoice.html">Invoices</a></li>  
  </ul> 
</div> 
  <div class="page-title">
            <h1>Cars</h1>
   </div>
  
  <img id="carselect_02" src="images/carselect_02.jpg" style="border:20px;margin:20px" width="280px" height="200px" alt="" />
  <img id="carselect_02" src="images/carselect_05.jpg" style="border:20px;margin:20px" width="280px" height="200px" alt="" />
  <img id="carselect_02" src="images/carselect_07.jpg" style="border:20px;margin:20px" width="280px" height="200px" alt="" />
  <img id="carselect_02" src="images/carselect_10.jpg" style="border:20px;margin:20px" width="280px" height="200px" alt="" />
  <img id="carselect_02" src="images/carselect_12.jpg" style="border:20px;margin:20px" width="280px" height="200px" alt="" />
  <img id="carselect_02" src="images/carselect_14.jpg" style="border:20px;margin:20px" width="280px" height="200px" alt="" />
  <img id="carselect_02" src="images/carselect_16.jpg" style="border:20px;margin:20px" width="280px" height="200px" alt="" />
  <img id="carselect_02" src="images/carselect_19.jpg" style="border:20px;margin:20px" width="280px" height="200px" alt="" />

<div align="center">

 
 
 
  
		<form name="form1" method="post" action="car.php">
		<p style="color:white">"View/Add/Remove Car Selection"</p>
		<p style="color:white"><label><input type="submit"  name="B3" id="B3" value="CLICK HERE TO View Already Selected cars"></label></p>
		
		<p style="color:white"><label>Your Name<input type="text" name="name" id="name"></label></p>
		<p style="color:white"><label>CAR ID <input type="text" name="carID" id="carID"></label></p>
		<p style="color:white"><label>Quantity<input type="text" name="quantity" id="quantity"></label></p>
		<p style="color:white"><label>PRICE <input type="text" placeholder="DO NOT ENTER COMMAS" name="price" id="price"> </label></p>
		
		<p style="color:white"><label><input type="submit"  name="B1" id="B1" value="Add A Car to your Purchase"></label></p>
		<p style="color:white"><label><input type="submit"  name="B2" id="B2" value="Remove A Car from your purchase "></label></p>
		
		</form> ';









}








?>
