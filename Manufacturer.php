<html>
	<head>
		<link rel="shortcut icon" href="Title-Logo-nobg.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/man-main.css">
		<title>Pharmacy</title>
	<head>
	<body>
		<?php
			include("php/manu.php");
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
                    <a class="active" href="Manufacturer.php"><img class="icon" src="icons/icons8-manufacturing-48.png"><span>Manufacturer</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="employee" href="Employees.php"><img class="icon" src="icons/icons8-employees-64 (1).png"><span>Employees</span></a>
                </dev>  
			</li>
            <li>
                <dev id="text">
                    <a class="logout" href="login form.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
		<div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-menu-rounded-50.png" height="35" width="35"><span>Manufacturer</span></h1>
        </div>
		<div id="content">
		<form method="post">
			<input type="text" placeholder="search" id="search">
			<label id="search-label"><h3>Search:</h3></label>
			<div id="table-size">
				<table id="table">
					<tr id="table-header">
						<th>Company id</th>
						<th>Company name</th>
						<th>Phone</th>
						<th>Address</th>
					</tr>
					<?php
							while ( $row = mysqli_fetch_array($result) )
							{
								echo "<tr>";
									echo "<td>".$row[0]."</td>";
									echo "<td>".$row[1]."</td>";
									echo "<td>".$row[2]."</td>";
									echo "<td>".$row[3]."</td>";
								echo "</tr>";
							}
						?>
				</table>
			</div>		
				<label id="ci-label"><h3>Company ID:</h3></label>
				<input type="text" id="Company-id" name="compID" readonly style="background:#cccccc;">
				<label id="cn-label"><h3>Company Name:</h3></label>
				<input type="text" placeholder="Company name" id="Company-name" name="compName">
				<label id="p-label"><h3>Phone:</h3></label>
				<input type="text" placeholder="Phone" id="Phone" name="compPhone">
				<label id="a-label"><h3>Address:</h3></label>
				<input type="text" placeholder="Address" id="Address" name="compAddress">
				<div id="button-padding">
					<button type="submit" onclick="addHtmlTableRow();" id="add" name="add">Add</button>
					<button type="submit" onclick="updateHtmlTableSelectedRow();" id="update" name="update">Update</button>
					<button type="submit" onclick="deleteSelectedRow();" id="delete" name="delete">Delete</button>
				</div>
			</form>
		</div>
		<script>
			var rIndex=1,
				table=document.getElementById("table");
			
			function checkEmptyInput()
			{
				var isEmpty=false,
					Companyname=document.getElementById("Company-name").value,
					Phone=document.getElementById("Phone").value,
					Address=document.getElementById("Address").value;
					
				if(Companyname==="")
				{
					alert("Company name can't be empty");
					isEmpty=true;
				}
				else if(Phone==="")
				{
					alert("Phone can't be empty");
					isEmpty=true;
				}
				else if(Address==="")
				{
					alert("Address can't be empty");
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
						
						Companyid=document.getElementById("Company-id").value,
						Companyname=document.getElementById("Company-name").value,
						Phone=document.getElementById("Phone").value,
						Address=document.getElementById("Address").value;
						
					cell1.innerHTML=Companyid;
					cell2.innerHTML=Companyname;
					cell3.innerHTML=Phone;
					cell4.innerHTML=Address;
				
					selectRowToInput()
				}	
			}
			
			function selectRowToInput()
			{
				
				for(var i=1;i<table.rows.length;i++)
				{
					table.rows[i].onclick=function()
					{
						rIndex=this.rowIndex;
						document.getElementById("Company-id").value=this.cells[0].innerHTML;
						document.getElementById("Company-name").value=this.cells[1].innerHTML;
						document.getElementById("Phone").value=this.cells[2].innerHTML;
						document.getElementById("Address").value=this.cells[3].innerHTML;
					};
				}
			}
			selectRowToInput()
			
			function updateHtmlTableSelectedRow()
			{
				var	Companyid=document.getElementById("Company-id").value,
					Companyname=document.getElementById("Company-name").value,
					Phone=document.getElementById("Phone").value,
					Address=document.getElementById("Address").value;
				if(!checkEmptyInput())
				{	
					table.rows[rIndex].cells[0].innerHTML=Companyid;
					table.rows[rIndex].cells[1].innerHTML=Companyname;
					table.rows[rIndex].cells[2].innerHTML=Phone;
					table.rows[rIndex].cells[3].innerHTML=Address;	
				}		
			}
			function deleteSelectedRow()
			{
				table.deleteRow(rIndex);
			}
		</script>
	<body>
<html>