<?php

include ("account.php") ;
( $dbh = mysql_connect ( $hostname, $username, $password ) )
	        or    die ( "Unable to connect to MySQL database" );

mysql_select_db( $project ); 


$username  =  $_REQUEST [ "username"] ; //WORKS WITH BOTH GET AND POST
$password   =  $_REQUEST [ "password"] ;
$FirstName = $_REQUEST ["FirstName"];
$LastName   =  $_REQUEST [ "LastName"] ;
$Address   =  $_REQUEST [ "Address"] ;
$zipcode   =  $_REQUEST [ "zipcode"] ;

$s="SELECT * FROM Login where ( username = '$username' and password = '$password' )";

$t= mysql_query ( $s ); 

$count = mysql_num_rows($t);


if($count > 0)
		{
	
		echo "User already exits !";
		 
		
		
		}
		else
		{
			
		   $id=(rand());
		   
		   
		    $s1="insert into Login values ( '$id', '$username' , '$password')";
			$s2="insert into Customers values ( '$id', '$FirstName', '$LastName', '$Address', '$zipcode')";


			mysql_query ( $s1  ) or die ( mysql_error() );
			mysql_query ( $s2  ) or die ( mysql_error() );

			print "<br>User has been inserted into the Database and now is able to login" ;


			
			
			
			
		}



?>