<style> table, td, caption { border: 2px solid blue ; padding: 10px; color: white ; } </style>
<style> td { border: 1px solid green ; color: white ; } </style>
<style> caption { color: white ; } </style>

<?php

tables();


 
include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );
mysql_select_db( $project ); 

 
if (isset($_POST['B1'])){

	insert();}
 
  function insert(){
  
$ID=$_POST['Id'];
$name=$_POST['name'];
$address=$_POST['address'];



 
$s="INSERT INTO Login VALUES ('$ID','$name','$address') "; 
print "<font color='red'><br>$s<br><br></font>";

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

$ID=$_POST['Id'];
$name=$_POST['name'];
$address=$_POST['address'];

$s= "DELETE FROM Login 
WHERE Name='$name' AND customerID='$ID' AND Address='$address' ";

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

$s= "SELECT * FROM Login";  


//1. Get table $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );
print "<font color='red'><br> Query inserted <br></font>";


//2. Get rows $r
print "<table>";
 
print "<caption>";
print "Customers";
print "</caption>";

print "<tr> <td>Customer ID</td> <td>Customer Name</td> <td>Customer Address</td></tr>";
while (   $r = mysql_fetch_array($t) )
{ 
	print "<tr>";
		print " <td>";
		print $r["customerID"];
	print "</td>";
		print "<td>";
		print $r["Name"];
	print "</td>";
		print " <td>";
		print $r["Address"];
	print "</td>";
	
	print  " </tr>";
		
}
	print " </table>";


}

function tables () {

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
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
<body bgcolor="#000000"> 
<div id="navbar"> 
  <ul> 
	<li><a href="homepage.html">Home</a></li> 
	<li><a href="company.html">Company</a></li> 
	<li><a href="customer.html">Customers</a></li> 
	<li><a href="Inventory.html">Inventory</a></li> 
	<li><a href="Invoice.html">Invoices</a></li>
  </ul> 
</div> 
  
<div align="center"  style="PADDING-TOP: 200px" >

 

 
  
		<form name="form1" method="post" action="loginpage2.php">
		<p style="color:white"><b>"View/Add/Remove Customers"</b></p>
		<p style="color:white"><label><input type="submit"  name="B3" id="B3" value="CLICK HERE TO View All Customers"></label></p>
		
		<p style="color:white"><label>Customer ID<input type="text" name="Id" id="Id"></label></p>
		<p style="color:white"><label>Customer Name<input type="text" name="name" id="name"></label></p>
		<p style="color:white"><label>Customer Address <input type="text" name="address" id="address"></label></p>
	
		
		<p style="color:white"><label><input type="submit"  name="B1" id="B1" value="Add A Customer"></label></p>
		<p style="color:white"><label><input type="submit"  name="B2" id="B2" value="Remove A Customer"></label></p>
		
		</form>';
		}

