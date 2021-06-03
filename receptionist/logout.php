<?php 
include("db_connect.php"); ?>


<?php
session_destroy();

session_unset();

header("Location:login.php");

?>