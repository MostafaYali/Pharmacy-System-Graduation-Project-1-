<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM med";
			$result = mysqli_query($conn,$show);
			
			if( isset($_POST['medID']) )
			{
				$medID = $_POST['medID'];
			}
			if( isset($_POST['medName']) )
			{
				$medName = $_POST['medName'];
			}
			if( isset($_POST['medBP']) )
			{
				$medBP = $_POST['medBP'];
			}
			if( isset($_POST['medSP']) )
			{
				$medSP = $_POST['medSP'];
			}
			if( isset($_POST['medQuantity']) )
			{
				$medQuantity = $_POST['medQuantity'];
			}
			if( isset($_POST['medMN']) )
			{
				$medMN = $_POST['medMN'];
			}
			if( isset($_POST['medDate']) )
			{
				$medDate = $_POST['medDate'];
			}
			
			$sqls = "";
			
			if(isset($_POST['add']))
			{
				$sqls = "INSERT INTO med (medName,medBP,medSP,medQuantity,medMN,medDate)
						VALUES ('$medName',$medBP,$medSP,$medQuantity,'$medMN','$medDate')";
						mysqli_query($conn,$sqls);
			}	
			else if(isset($_POST['update']))
			{
				$sqls = "UPDATE med SET medName='$medName',medBP=$medBP,medSP=$medSP,medQuantity=$medQuantity,medMN='$medMN',medDate='$medDate' 
						 WHERE medID=$medID";
				mysqli_query($conn,$sqls);
			}
			else if(isset($_POST['delete']))
			{
				$sqls = "DELETE FROM med WHERE medID=$medID";
				mysqli_query($conn,$sqls);
			}
		?>