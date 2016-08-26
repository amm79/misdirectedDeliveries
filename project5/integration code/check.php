<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
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
 
   
table, td, caption { border: 2px solid blue ; padding: 10px; color: white ; margin: auto;  } 
td { border: 1px solid green ; color: white ; } 
caption { color: white ; } 




 
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
  


  
  
<div align="center-left">

 
 
 
  
		<form name="form1"  align="middle" method="post" action="check2.php">
		<p style="color:black"><b>"Enter the Valid Cargo Number from the table below to see what Flight your Cargo is on "</b></p>
		
		<p style="color:black"><label>CargoNumber<input type="text" name="number" id="number"></label></p>
		
		<p style="color:black"><label><input type="submit"  name="B3" id="B3" value="Submit"></label></p>
		
		
		</form>
		
		
		
		
</div>
<?php
    
include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );

mysql_select_db( $project ); 


$s= "SELECT * FROM Delivery";  


//1. Get table $t
( $t = mysql_query ( $s  ) ) or die ( mysql_error() );


//2. Get rows $r
echo "<table>";
 

echo "<tr>  <td>Cargo Number</td>  </tr>";
while (   $r = mysql_fetch_array($t) )
{ 
	echo "<tr>";
		
		echo "<td>"; 
		echo $r["CargoNumber"];
	echo "</td>";
	    
	
	echo  " </tr>";
		 
}
	echo " </table>";
	
	

	

	

?>

</body>
