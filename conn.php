<?php

$host="localhost";
$user="root";
$password="";
$db="pms";


$data=mysqli_connect($host,$user,$password,$db);
if($data===false)
{
    die("connection is failed");    
}

?>