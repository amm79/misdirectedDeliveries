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
  
$order=$_POST['order'];
$item=$_POST['item'];
$customer=$_POST['customer'];
$amount=$_POST['amount'];



 
$s="INSERT INTO Invoices VALUES ('$order','$item','$customer', '$amount') "; 
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

$order=$_POST['order'];
$item=$_POST['item'];
$customer=$_POST['customer'];
$amount=$_POST['amount'];


$s= "DELETE FROM Invoices 
WHERE OrderNumber='$order' AND carID='$item' AND customerID='$customer' AND AmountBillable='$amount' ";

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

$s= "SELECT * FROM Invoices";  


//1. Get table $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );
print "<font color='red'><br> Query inserted <br></font>";


//2. Get rows $r
print "<table>";
 
print "<caption>";
print "Invoices";
print "</caption>";

print "<tr> <td>Order Number</td> <td>Car ID</td> <td>Customer ID</td> <td>Amount Billable</td> </tr>";
while (   $r = mysql_fetch_array($t) )
{ 
	print "<tr>";
		print " <td>";
		print $r["OrderNumber"];
	print "</td>";
		print "<td>";
		print $r["carID"];
	print "</td>";
		print " <td>";
		print $r["customerID"];
	print "</td>";
		print " <td>";
		print $r["AmountBillable"];
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

 

 
  
		<form name="form1" method="post" action="invoice.php">
		<p style="color:white"><b>"View/Add/Remove Invoices"</b></p>
		<p style="color:white"><label><input type="submit"  name="B3" id="B3" value="CLICK HERE TO View All Invoices"></label></p>
		
		<p style="color:white"><label>Order Number<input type="text" name="order" id="order"></label></p>
		<p style="color:white"><label>Item Number<input type="text" name="item" id="item"></label></p>
		<p style="color:white"><label>Customer Number<input type="text" name="customer" id="customer"></label></p>
		<p style="color:white"><label>Amount Billable<input type="text" name="amount" id="amount"></label></p>
	
		
		<p style="color:white"><label><input type="submit"  name="B1" id="B1" value="Add An Invoice"></label></p>
		<p style="color:white"><label><input type="submit"  name="B2" id="B2" value="Remove An Invoice"></label></p>
		
		</form>';
		}


