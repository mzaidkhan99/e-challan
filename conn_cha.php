<?php
$hostname = "localhost";
$uname = "root";
$pass = "";
$db_name = "e_challan";

$connection = mysqli_connect($hostname, $uname, $pass, $db_name);

if (!$connection) {
   echo ("not connected \n ". mysqli_error($connection));
} else{
   echo ("connection successful");
}
?>