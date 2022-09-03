<?php 
$db=new MYSQLi("localhost","root","","laundry");
    if($db->connect_error>0){
		die('Connection error');
	}else
	{
		echo'';
	} ;
?>