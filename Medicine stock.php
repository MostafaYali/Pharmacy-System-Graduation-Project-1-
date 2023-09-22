<html>
	<head>
		<link rel="shortcut icon" href="Title-Logo-nobg.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/medicine stock page.css">
		<title>Pharmacy</title>
	<head>
	<body>
		<?php
			include("php/med.php");
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
                    <a class="active" href="Medicine stock.php"><img class="icon" src="icons/icons8-medicines-64.png"><span>Medicines</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="Customer" href="Customers 1.php"><img class="icon" src="icons/icons8-customers-64.png"><span>Customers</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="Manufacturer" href="Manufacturer.php"><img class="icon" src="icons/icons8-manufacturing-48.png"><span>Manufacturer</span></a>
                </dev>
			</li>
			<li>
                <dev id="text">
                    <a class="Employees" href="Employees.php"><img class="icon" src="icons/icons8-employees-64 (1).png"><span>Employees</span></a>
                </dev>  
			</li>
            <li>
                <dev id="text">
                    <a class="Logout" href="login form.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
        <div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-menu-rounded-50.png" height="35" width="35"><span>Medicines</span></h1>
        </div>
		<div id="content">
			<form method="post">
				<input type="text" placeholder="search" id="search">
				<label id="search-label"><h3>Search:</h3></label>
				<div id="table-size">
					<table id="table">
						<tr id="table-header">
							<th>Medicine id</th>
							<th>Medicine name</th>
							<th>Buying price</th>
							<th>Selling price</th>
							<th>Medicine quantity</th>
							<th>Manufacturer name</th>
							<th>Expiration date</th>
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
					<label id="mi-label"><h3>Medicine ID:</h3></label>
					<input type="text" id="Medicine-id" name="medID" readonly style="background:#cccccc;">
					<label id="mn-label"><h3>Medicine Name:</h3></label>
					<input type="text" placeholder="Medicine name" id="Medicine-name" name="medName">
					<label id="bp-label"><h3>Buying Price:</h3></label>
					<input type="text" placeholder="Buying price" id="Buying-price" name="medBP">
					<label id="sp-label"><h3>Selling Price:</h3></label>
					<input type="text" placeholder="Selling price" id="Selling-price" name="medSP">
					<label id="q-label"><h3>Quantity:</h3></label>
					<input type="text" placeholder="Quantity" id="Quantity" name="medQuantity">
					<label id="ma-label"><h3>Manufacturer Name:</h3></label>
					<input list="Manufacturer name" placeholder="Manufacturer name" id="Manufacturer-name" name="medMN">
					<datalist id="Manufacturer name">
						<option value="Example1">
						<option value="Example2">
						<option value="Example3">
					</datalist>
					<label id="ed-label"><h3>Expiration Date:</h3></label>
					<input type="date" id="Date" name="medDate">
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
					medicineName=document.getElementById("Medicine-name").value,
					buyingPrice=document.getElementById("Buying-price").value,
					sellingPrice=document.getElementById("Selling-price").value,
					quantity=document.getElementById("Quantity").value,
					manufacturerName=document.getElementById("Manufacturer-name").value,
					date=document.getElementById("Date").value;
					
				if(medicineName==="")
				{
					alert("Medicinen name can't be empty");
					isEmpty=true;
				}
				else if(buyingPrice==="")
				{
					alert("Buying price can't be empty");
					isEmpty=true;
				}
				else if(sellingPrice==="")
				{
					alert("Selling price can't be empty");
					isEmpty=true;
				}
				else if(quantity==="")
				{
					alert("Quantity can't be empty");
					isEmpty=true;
				}
				else if(manufacturerName==="")
				{
					alert("Manufacturer name can't be empty");
					isEmpty=true;
				}
				else if(date==="")
				{
					alert("Date can't be empty");
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
						medicineId=document.getElementById("Medicine-id").value,
						medicineName=document.getElementById("Medicine-name").value,
						buyingPrice=document.getElementById("Buying-price").value,
						sellingPrice=document.getElementById("Selling-price").value,
						quantity=document.getElementById("Quantity").value,
						manufacturerName=document.getElementById("Manufacturer-name").value,
						date=document.getElementById("Date").value;
					
					cell1.innerHTML=medicineId;
					cell2.innerHTML=medicineName;
					cell3.innerHTML=buyingPrice;
					cell4.innerHTML=sellingPrice;
					cell5.innerHTML=quantity;
					cell6.innerHTML=manufacturerName;
					cell7.innerHTML=date;
				
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
						document.getElementById("Medicine-id").value=this.cells[0].innerHTML;
						document.getElementById("Medicine-name").value=this.cells[1].innerHTML;
						document.getElementById("Buying-price").value=this.cells[2].innerHTML;
						document.getElementById("Selling-price").value=this.cells[3].innerHTML;
						document.getElementById("Quantity").value=this.cells[4].innerHTML;
						document.getElementById("Manufacturer-name").value=this.cells[5].innerHTML;
						document.getElementById("Date").value=this.cells[6].innerHTML;
					};
				}
			}
			selectRowToInput()
			
			function updateHtmlTableSelectedRow()
			{
				var	medicineId=document.getElementById("Medicine-id").value,
					medicineName=document.getElementById("Medicine-name").value,
					buyingPrice=document.getElementById("Buying-price").value,
					sellingPrice=document.getElementById("Selling-price").value,
					quantity=document.getElementById("Quantity").value,
					manufacturerName=document.getElementById("Manufacturer-name").value,
					date=document.getElementById("Date").value;
				if(!checkEmptyInput())
				{	
					table.rows[rIndex].cells[0].innerHTML=medicineId;
					table.rows[rIndex].cells[1].innerHTML=medicineName;
					table.rows[rIndex].cells[2].innerHTML=buyingPrice;
					table.rows[rIndex].cells[3].innerHTML=sellingPrice;	
					table.rows[rIndex].cells[4].innerHTML=quantity;
					table.rows[rIndex].cells[5].innerHTML=manufacturerName;	
					table.rows[rIndex].cells[6].innerHTML=date;	
				}		
			}
			function deleteSelectedRow()
			{
				table.deleteRow(rIndex);
			}
		</script>
	<body>
<html>