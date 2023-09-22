<html>
	<head>
		<link rel="shortcut icon" href="Title-Logo-nobg.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/Employee-main.css">
		<title>Pharmacy</title>
	<head>
	<body>
		<?php
			include("php/emp.php");
		?>	
		<ul class="side-bar">
			<dev>
                    <img class="main-logo" src="Logo-nobg.png" width="375px" >
            </dev>
			<li>
                <dev id="text">
				    <a class="Dashboard" href="Dashboard.php"><img class="icon" src="icons/icons8-dashboard-60.png"><span>Dashboard</span></a>
                </dev>    
            </li>
			<li>
                <dev id="text">
                    <a class="Medicines" href="Medicine stock.php"><img class="icon" src="icons/icons8-medicines-64.png"><span>Medicines</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="customer" href="Customers 1.php"><img class="icon" src="icons/icons8-customers-64.png"><span>Customer</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="Manufacturer" href="Manufacturer.php"><img class="icon" src="icons/icons8-manufacturing-48.png"><span>Manufacturer</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="active" href="Employees.php"><img class="icon" src="icons/icons8-employees-64 (1).png"><span>Employees</span></a>
                </dev>  
			</li>
            <li>
                <dev id="text">
                    <a class="logout" href="login form.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
        <div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-menu-rounded-50.png" height="35" width="35"><span>Employee</span></h1>
        </div>
		<div id="content">
			<form method="post">
				<input type="text" placeholder="search" id="search" name="search">
				<label id="search-label"><h3>Search:</h3></label>
				<div id="table-size">
					<table id="table">
						<tr id="table-header">
							<th>ID</th>
							<th>Employee name</th>
							<th>Employee email</th>
							<th>Employee age</th>
							<th>Salary</th>
							<th>Phone</th>
							<th>Password</th>
							<th>Employee specialization</th>
						</tr>
						<?php
							while ( $row = mysqli_fetch_array($result) )
							{
								echo "<tr>";
									echo "<td>".$row[0]."</td>";
									echo "<td>".$row[1]."</td>";
									echo "<td>".$row[2]."</td>";
									echo "<td>".$row[3]."</td>";
									echo "<td>".$row[4]."</td>";
									echo "<td>".$row[5]."</td>";
									echo "<td>".$row[6]."</td>";
									echo "<td>".$row[7]."</td>";
								echo "</tr>";
							}
						?>
					</table>
				</div>	
					<label id="ei-label" name="empID"><h3>Employee ID</h3></label>
					<input type="text" id="Employee-id" name="empID" readonly style="background:#cccccc;">
					<label id="en-label"><h3>Employee Name:</h3></label>
					<input type="text" placeholder="Employee name" id="Employee-name" name="empName">
					<label id="ee-label"><h3>Employee E-mail:</h3></label>
					<input type="text" placeholder="Employee email" id="Employee-email" name="empEmail">
					<label id="ea-label"><h3>Employee Age:</h3></label>
					<input type="text" placeholder="Employee age" id="Employee-age" name="empAge">
					<label id="s-label"><h3>Salary:</h3></label>
					<input type="text" placeholder="Salary" id="Salary" name="empSalary">
					<label id="p-label"><h3>Phone:</h3></label>
					<input type="text" placeholder="Phone" id="Phone" name="empPhone">
					<label id="ps-label"><h3>Password:</h3></label>
					<input type="text" placeholder="Password" id="Password" name="empPassword">
					<label id="es-label"><h3>Employee Specialization:</h3></label>
					<select id="Employee-specialization" name="empSpecialization">
						<option>Select employee specialization</option>
						<option>Pharmacist</option>
						<option>Cashier</option>
					</select>
					<button type="submit" onclick="addHtmlTableRow();" id="add" name="add">Add</button>
					<button type="submit" onclick="updateHtmlTableSelectedRow();" id="update" name="update">Update</button>
					<button type="submit" onclick="deleteSelectedRow();" id="delete" name="delete">Delete</button>
			</form>
		</div>
		<script>
			var rIndex=1,
				table=document.getElementById("table");
			
			function checkEmptyInput()
			{
				var isEmpty=false,
					employeeName=document.getElementById("Employee-name").value,
					employeeEmail=document.getElementById("Employee-email").value,
					employeeAge=document.getElementById("Employee-age").value,
					salary=document.getElementById("Salary").value,
					phone=document.getElementById("Phone").value,
					password=document.getElementById("Password").value,
					employeeSpecialization=document.getElementById("Employee-specialization").value;
					

				if(employeeName==="")
				{
					alert("Employee name can't be empty");
					isEmpty=true;
				}
				else if(employeeEmail==="")
				{
					alert("Employee email can't be empty");
					isEmpty=true;
				}
				else if(employeeAge==="")
				{
					alert("Employee age can't be empty");
					isEmpty=true;
				}
				else if(salary==="")
				{
					alert("Salary can't be empty");
					isEmpty=true;
				}
				else if(phone==="")
				{
					alert("Phone can't be empty");
					isEmpty=true;
				}
				else if(password==="")
				{
					alert("Password can't be empty");
					isEmpty=true;
				}
				return isEmpty;
			}
			
			function addHtmlTableRow()
			{
				if(!checkEmptyInput())
				{
					var newRow=table.insertRow(table.length),
						cell1=newRow.insertCell(0),
						cell2=newRow.insertCell(1),
						cell3=newRow.insertCell(2),
						cell4=newRow.insertCell(3),
						cell5=newRow.insertCell(4),
						cell6=newRow.insertCell(5),
						cell7=newRow.insertCell(6),
						cell8=newRow.insertCell(7),
						employeeId=document.getElementById("Employee-id").value,
						employeeName=document.getElementById("Employee-name").value,
						employeeEmail=document.getElementById("Employee-email").value,
						employeeAge=document.getElementById("Employee-age").value,
						salary=document.getElementById("Salary").value,
						phone=document.getElementById("Phone").value,
						password=document.getElementById("Password").value,
						employeeSpecialization=document.getElementById("Employee-specialization").value;
					
					cell1.innerHTML=employeeId;
					cell2.innerHTML=employeeName;
					cell3.innerHTML=employeeEmail;
					cell4.innerHTML=employeeAge;
					cell5.innerHTML=salary;
					cell6.innerHTML=phone;
					cell7.innerHTML=password;
					cell8.innerHTML=employeeSpecialization;
					selectedRowToInput();
				}	
			}
			
			function selectedRowToInput()
			{
				for(var i=1;i<table.rows.length;i++)
				{
					table.rows[i].onclick=function()
					{
						rIndex=this.rowIndex;
						document.getElementById("Employee-id").value=this.cells[0].innerHTML;
						document.getElementById("Employee-name").value=this.cells[1].innerHTML;
						document.getElementById("Employee-email").value=this.cells[2].innerHTML;
						document.getElementById("Employee-age").value=this.cells[3].innerHTML;
						document.getElementById("Salary").value=this.cells[4].innerHTML;
						document.getElementById("Phone").value=this.cells[5].innerHTML;
						document.getElementById("Password").value=this.cells[6].innerHTML;
						document.getElementById("Employee-specialization").value=this.cells[7].innerHTML;
					};
				}
			}
			selectedRowToInput();
			
			function updateHtmlTableSelectedRow()
			{
				var	employeeId=document.getElementById("Employee-id").value,
					employeeName=document.getElementById("Employee-name").value,
					employeeEmail=document.getElementById("Employee-email").value,
					employeeAge=document.getElementById("Employee-age").value,
					salary=document.getElementById("Salary").value,
					phone=document.getElementById("Phone").value,
					password=document.getElementById("Password").value,
					employeeSpecialization=document.getElementById("Employee-specialization").value;
				if(!checkEmptyInput())	
				{
					table.rows[rIndex].cells[0].innerHTML=employeeId;
					table.rows[rIndex].cells[1].innerHTML=employeeName;
					table.rows[rIndex].cells[2].innerHTML=employeeEmail;
					table.rows[rIndex].cells[3].innerHTML=employeeAge;
					table.rows[rIndex].cells[4].innerHTML=salary;
					table.rows[rIndex].cells[5].innerHTML=phone;
					table.rows[rIndex].cells[6].innerHTML=password;
					table.rows[rIndex].cells[7].innerHTML=employeeSpecialization;
				}
			}
			
			function deleteSelectedRow()			
			{
				table.deleteRow(rIndex);
			}
		</script>
	<body>
<html>