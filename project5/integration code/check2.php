<style> table, td, caption { border: 2px solid blue ; padding: 10px; color: black ; margin: auto;  } </style>
<style> td { border: 1px solid green ; color: black ; } </style>
<style> caption { color: black ; } </style>



<?php

tables();
  
  
  
  
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





if (isset($_POST['B3'])){

	insert();}
	
	echo '
	</div>
	</body>
	</html>';
 
  function insert(){
  
  $number=$_POST['number'];
  
  
  
 
  $data=mysql_query ( "SELECT PlaneID FROM Delivery where CargoNumber='$number'");
  if(mysql_num_rows($data) == 0) { echo "<br><center>Invalid cargo number, please pick one from the database</center>";}
  else{
  $id=mysql_fetch_array($data)['PlaneID'];
  $s2="SELECT * FROM Airline where PlaneID='$id'";
  $data2=mysql_query ($s2);
  
  
	print "<table>";
 
print "<caption>";
print "Cargos Already Loaded";
print "</caption>";

print "<tr> <td>PlaneID</td> <td>Tail Number</td> <td>Plane Type</td> <td>Pilot Name</td> <td>Fuel</td> </tr>";
while (   $r = mysql_fetch_array($data2) )
{ 
	print "<tr>";
		print " <td>";
		print $r["PlaneID"];
	print "</td>";
		print "<td>";
		print $r["TailNumber"];
	print "</td>";
	    print " <td>";
		print $r["PlaneType"];
	print "</td>";
		print " <td>";
		print $r["PilotName"];
	print "</td>";
	    print " <td>";
		print $r["Fuel"];
	print "</td>";
	
	print  " </tr>";
		
}
	print " </table>";
	


  }
  
  
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
		
		
		</form>';









}


  
  
  
     


   
   
   
      
  



	 
	 
	 





?>