<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM selling";
			$result = mysqli_query($conn,$show);
			
			if( isset($_POST['medID']) )
			{
				$medID = $_POST['medID'];
			}
			if( isset($_POST['medName']) )
			{
				$medName = $_POST['medName'];
			}
			if( isset($_POST['pricePerUnit']) )
			{
				$pricePerUnit = $_POST['pricePerUnit'];
			}
			if( isset($_POST['noOfUnits']) )
			{
				$noOfUnits = $_POST['noOfUnits'];
			}
			if( isset($_POST['date']) )
			{
				$date = $_POST['date'];
			}
			if( isset($_POST['totalPrice']) )
			{
				$totalPrice = $_POST['totalPrice'];
			}
			
			$sqls = "";
			
			if(isset($_POST['add']))
			{
				$sqls = "INSERT INTO selling (medID,medName,pricePerUnit,noOfUnits,date,totalPrice)
						VALUES ($medID,'$medName',$pricePerUnit,$noOfUnits,'$date',$totalPrice)";
						mysqli_query($conn,$sqls);
			}	
			else if(isset($_POST['remove']))
			{
				$sqls = "DELETE FROM selling WHERE medID=$medID";
				mysqli_query($conn,$sqls);
			}
		?>