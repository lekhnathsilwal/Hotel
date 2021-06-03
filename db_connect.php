<?php
	error_reporting(0);
	session_start();
	$database="vanja_hotel"; 
	$connection=mysqli_connect("localhost","root","","$database") or die("cannot connect");       	//establishing connection with server
	if(mysqli_connect_errno()){
		echo"Failed to connect to MySQL";
		mysqli_connect_error();
	}
?>