<?php

session_start();
include "conn.php" ;

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql= "SELECT * FROM login WHERE username ='".$username."' AND password ='".$password."'";

    $result = mysqli_query($data,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row["usertype"] =="admin")
    {
        $_SESSION["username"]=$username;
       header("location:Dashboard.php");
      // echo "admin";
        
    }
    else if($row["usertype"] == "casher"){
        $_SESSION["username"]=$username;
       header("location:Sell_Medicine.php");
    //echo "user";
    } else if($row["usertype"] == "pharmacy"){
        $_SESSION["username"]=$username;
       header("location:Medicine stock.php");
    //echo "user";
}
    else 
    {
        echo"username or password is not correcrt";
    }
}

?>