<?php
			$host = "localhost";
			$user = "root";
			$pass = "";
			$db = "pms";
			
			$conn = mysqli_connect($host,$user,$pass,$db);
			
			$show = "SELECT * FROM emp";
			$result = mysqli_query($conn,$show);

			if( isset($_POST['empID']) )
			{
				$empID = $_POST['empID'];
			}
			if( isset($_POST['empName']) )
			{
				$empName = $_POST['empName'];
			}
			if( isset($_POST['empEmail']) )
			{
				$empEmail = $_POST['empEmail'];
			}
			if( isset($_POST['empAge']) )
			{
				$empAge = $_POST['empAge'];
			}
			if( isset($_POST['empSalary']) )
			{
				$empSalary = $_POST['empSalary'];
			}
			if( isset($_POST['empPhone']) )
			{
				$empPhone = $_POST['empPhone'];
			}
			if( isset($_POST['empPassword']) )
			{
				$empPassword = $_POST['empPassword'];
			}
			if( isset($_POST['empSpecialization']) )
			{
				$empSpecialization = $_POST['empSpecialization'];
			}

			$sqls = "";
			
			if(isset($_POST['add']))
			{
				$sqls = "INSERT INTO emp (empName,empEmail,empAge,empSalary,empPhone,empPassword,empSpecialization)
						VALUES ('$empName','$empEmail',$empAge,$empSalary,'$empPhone','$empPassword','$empSpecialization')";
				mysqli_query($conn,$sqls);		
			}
			if(isset($_POST['update']))
			{
				$sqls = "UPDATE emp SET empName='$empName',empEmail='$empEmail',empAge=$empAge,empSalary=$empSalary,empPhone='$empPhone',empPassword='$empPassword',empSpecialization='$empSpecialization'
						WHERE empID=$empID";
				mysqli_query($conn,$sqls);
			}
			if(isset($_POST['delete']))
			{
				$sqls = "DELETE FROM emp WHERE empID=$empID";
				mysqli_query($conn,$sqls);
			}
		?>