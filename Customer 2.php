<html>
	<head>
		<link rel="shortcut icon" href="Title-Logo-nobg.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/customer-main-manger.css">
		<title>Pharmacy</title>
	<head>
	<body>
		<?php
			include("php/cust.php");
		?>	
		<ul class="side-bar">
			<dev>
                    <img class="main-logo" src="Logo-nobg.png" width="375px" >
            </dev>
			<li>
                <dev id="text">
                    <a class="Medicines" href="Medicine stock 2.php"><img class="icon" src="icons/icons8-medicines-64.png"><span>Medicines</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="active" href="Customer 2.php"><img class="icon" src="icons/icons8-customers-64.png"><span>Customers</span></a>
                </dev>
			</li>
            <li>
                <dev id="text">
                    <a class="Logout" href="login form.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
        <div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-menu-rounded-50.png" height="35" width="35"><span>Customer</span></h1>
        </div>
		<div id="content">
			<form method="post">
				<input type="text" placeholder="search" id="search">
				<label id="search-label"><h3>Search:</h3></label>
				<div id="table-size">
					<table id="table">
						<tr id="table-header">
							<th>Customer id</th>
							<th>Customer name</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Gender</th>
							<th>Date of birth</th>
							<th>Insurance company</th>
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
								echo "</tr>";
							}
						?>
					</table>
				</div>	
				<label id="ci-label"><h3>Customer ID:</h3></label>
				<input type="text" id="Customer-id" name="custID" readonly style="background:#cccccc;">
				<label id="cn-label"><h3>Customer Name:</h3></label>
				<input type="text" placeholder="Customer name" id="Customer-name" name="custName">
				<label id="P-label"><h3>Phone:</h3></label>
				<input type="text" placeholder="Phone" id="Phone" name="custPhone">
				<label id="a-label"><h3>Address:</h3></label>
				<input type="text" placeholder="Address" id="Address" name="custAddress">
				<label id="g-label"><h3>Gender:</h3></label>
				<input list="gender" placeholder="Gender" id="Gender" name="custGender">
				<datalist id="gender">
					<option value="Male">
					<option value="Female">
				</datalist>
				<label id="dob-label"><h3>Date Of Birth:</h3></label>
				<input type="date" id="Date" name="custBirth">
				<label id="ic-label"><h3>Insurance Company:</h3></label>
				<input type="text" placeholder="Insurance company" id="Insurance-company" name="custIC">
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
					customerName=document.getElementById("Customer-name").value,
					phone=document.getElementById("Phone").value,
					address=document.getElementById("Address").value,
					gender=document.getElementById("Gender").value,
					date=document.getElementById("Date").value,
					insuranceCompany=document.getElementById("Insurance-company").value;
			
				if(customerName==="")
				{
					alert("Customer name can't be empty");
					isEmpty=true;
				}
				else if(phone==="")
				{
					alert("Phone can't be empty");
					isEmpty=true;
				}
				else if(address==="")
				{
					alert("Address can't be empty");
					isEmpty=true;
				}
				else if(gender==="")
				{
					alert("Gender can't be empty");
					isEmpty=true;
				}
				else if(date==="")
				{
					alert("Date can't be empty");
					isEmpty=true;
				}
				else if(insuranceCompany==="")
				{
					alert("Insurance company can't be empty");
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
					
					customerId=document.getElementById("Customer-id").value,
					customerName=document.getElementById("Customer-name").value,
					phone=document.getElementById("Phone").value,
					address=document.getElementById("Address").value,
					gender=document.getElementById("Gender").value,
					date=document.getElementById("Date").value,
					insuranceCompany=document.getElementById("Insurance-company").value;

					cell1.innerHTML=customerId;
					cell2.innerHTML=customerName;
					cell3.innerHTML=phone;
					cell4.innerHTML=address;
					cell5.innerHTML=gender;
					cell6.innerHTML=date;
					cell7.innerHTML=insuranceCompany;
					
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
						document.getElementById("Customer-id").value=this.cells[0].innerHTML;
						document.getElementById("Customer-name").value=this.cells[1].innerHTML;
						document.getElementById("Phone").value=this.cells[2].innerHTML;
						document.getElementById("Address").value=this.cells[3].innerHTML;
						document.getElementById("Gender").value=this.cells[4].innerHTML;
						document.getElementById("Date").value=this.cells[5].innerHTML;
						document.getElementById("Insurance-company").value=this.cells[6].innerHTML;
					};
				}
			}
			selectRowToInput()
			
			function updateHtmlTableSelectedRow()
			{
				var	customerId=document.getElementById("Customer-id").value,
					customerName=document.getElementById("Customer-name").value,
					phone=document.getElementById("Phone").value,
					address=document.getElementById("Address").value,
					gender=document.getElementById("Gender").value,
					date=document.getElementById("Date").value,
					insuranceCompany=document.getElementById("Insurance-company").value;
					
				if(!checkEmptyInput())
				{	
					table.rows[rIndex].cells[0].innerHTML=customerId;
					table.rows[rIndex].cells[1].innerHTML=customerName;
					table.rows[rIndex].cells[2].innerHTML=phone;
					table.rows[rIndex].cells[3].innerHTML=address;
					table.rows[rIndex].cells[4].innerHTML=gender;	
					table.rows[rIndex].cells[5].innerHTML=date;
					table.rows[rIndex].cells[6].innerHTML=insuranceCompany;	
				}		
			}
			function deleteSelectedRow()
			{
				table.deleteRow(rIndex);
			}
		</script>
	<body>
<html>