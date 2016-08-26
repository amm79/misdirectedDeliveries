<style> table, td, caption { border: 2px solid blue ; padding: 10px; color: white ; margin: auto;  } </style>
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

$ID=$_POST['ID'];
$number=$_POST['number'];
$weight=$_POST['weight'];
$airport=$_POST['airport'];
$city=$_POST['city'];

$s="INSERT INTO Delivery VALUES ('$ID','$number','$weight','$airport','$city') "; 
print "<center><br>$s<br><br></center>";

//1. Get table $t
if( $t = mysql_query ( $s  ) ) {
print "<center><font color='red'><br> Query inserted <br></font></center>";}

$result = mysql_query("SELECT * FROM Airline WHERE PlaneID= '$ID'");

        if(mysql_num_rows($result) > 0) {
			echo "<center><font color='red'> You may have a Duplicate Entry for CargoNumber  </font></center>" . mysql_error(); }
			
		else { mysql_error();}
	 
	 
	 



}


if (isset($_POST['B2'])){

	remove();}
	
function remove (){


$ID=$_POST['ID'];
$number=$_POST['number'];
$weight=$_POST['weight'];
$airport=$_POST['airport'];
$city=$_POST['city'];

$s= "DELETE FROM Delivery 
WHERE PlaneID='$ID' AND CargoNumber='$number' AND Weight='$weight' AND Airport='$airport' AND City='$city'";

print "<center><font color='red'><br>$s<br><br></font></center>";

//1. Get table $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );


print "<center><font color='red'><br>Query is REMOVED!<br></font></center>";
}


if (isset($_POST['B3'])){

	All();}
	
	echo '
	</div>
	</body>
	</html>';
	
function All (){

$s= "SELECT * FROM Delivery";  


//1. Get table $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );
print "<center><font color='red'><br> Query inserted <br></font></center>";


//2. Get rows $r
print "<table>";
 
print "<caption>";
print "Cargos To Be Delivered";
print "</caption>";

print "<tr> <td>PlaneID</td> <td>Cargo Number</td> <td>Cargo Weight</td> <td>Destination Airport</td> <td>Destination City</td> </tr>";
while (   $r = mysql_fetch_array($t) )
{ 
	print "<tr>";
		print " <td>";
		print $r["PlaneID"];
	print "</td>";
		print "<td>";
		print $r["CargoNumber"];
	print "</td>";
	    print " <td>";
		print $r["Weight"];
	print "</td>";
		print " <td>";
		print $r["Airport"];
	print "</td>";
	    print " <td>";
		print $r["City"];
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
<style>
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
	text-align:center;

	
	} 
 
#navbar ul li a { 
	text-decoration: none; 
	padding: .2em 1em; 
	color: #fff; 
	background-color: #000; 
	
	} 
 

 
</style> 
</head> 
<body bgcolor="#6699FF"> 
<div id="navbar"> 
  <center><ul> 
	<li> <a href="home.html">Home</a> </li>
	<li><a href="load.html">LOAD A PACKAGE</a></li> 
	<li><a href="check.php">CHECK ONBOARD PACKAGE</a></li>  
  </ul> </center>
</div> 
  
  <center><img id="table1" src="plane.jpg" style="border:20px;margin:20px;align:center" width="310px" height="200px"  align="middle" alt="" /></center>

<div align="center-left">

 
 
 
  
		<form name="form1"  align="middle" method="post" action="load.php">
		<p style="color:black">"View/Add/Remove Cargo"</p>
		<p style="color:black">"Enter the plane ID you want to load your Cargo on Below:"</p>
		<p style="color:black"><label><input type="submit"  name="B3" id="B3" value="CLICK HERE TO View Already Loaded Cargo"></label></p>
		
		<p style="color:black"><label>Plane ID<input type="text" name="ID" id="ID"></label></p>
		<p style="color:black"><label>Cargo Number<input type="text" name="number" id="number"></label></p>
		<p style="color:black"><label>Weight(pounds)<input type="text" placeholder="DO NOT ENTER COMMAS" name="weight" id="weight"> </label></p>
		<p style="color:black"><label>Destination Airport<input type="text" name="airport" id="airport"></label></p>
		<p style="color:black"><label>Destination City<input type="text" name="city" id="city"></label></p>
		
		<p style="color:black"><label><input type="submit"  name="B1" id="B1" value="Load cargo on the airline"></label></p>
		<p style="color:black"><label><input type="submit"  name="B2" id="B2" value="Remove cargo on the airline"></label></p>
		
		</form>';









}








?>
