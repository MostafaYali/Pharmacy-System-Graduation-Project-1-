<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM cust";
			$result = mysqli_query($conn,$show);
			
			if( isset($_POST['custID']) )
			{
				$custID = $_POST['custID'];
			}
			if( isset($_POST['custName']) )
			{
				$custName = $_POST['custName'];
			}
			if( isset($_POST['custPhone']) )
			{
				$custPhone = $_POST['custPhone'];
			}
			if( isset($_POST['custAddress']) )
			{
				$custAddress = $_POST['custAddress'];
			}
			if( isset($_POST['custGender']) )
			{
				$custGender = $_POST['custGender'];
			}
			if( isset($_POST['custBirth']) )
			{
				$custBirth = $_POST['custBirth'];
			}
			if( isset($_POST['custIC']) )
			{
				$custIC = $_POST['custIC'];
			}
			
			$sqls = "";
			
			if(isset($_POST['add']))
			{
				$sqls = "INSERT INTO cust (custName,custPhone,custAddress,custGender,custBirth,custIC)
						VALUES ('$custName','$custPhone','$custAddress','$custGender','$custBirth','$custIC')";
						mysqli_query($conn,$sqls);
			}	
			else if(isset($_POST['update']))
			{
				
				$sqls = "UPDATE cust SET custName='$custName',custPhone='$custPhone',custAddress='$custAddress',custGender='$custGender',custBirth='$custBirth',custIC='$custIC' 
						 WHERE custID=$custID";
				mysqli_query($conn,$sqls);
			}
			else if(isset($_POST['delete']))
			{
				$sqls = "DELETE FROM cust WHERE custID=$custID";
				mysqli_query($conn,$sqls);
			}
		?>