<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	<link rel="shortcut icon" href="Title-Logo-nobg.png" type="image/x-icon" />
	<link rel="stylesheet" href="css/sell-medicine-main.css">
		<title>Pharmacy</title>
	</head>
	<body>
		<?php
			include("php/selling.php");
		?>
		<ul class="side-bar">
			<dev>
                    <img class="main-logo" src="Logo-nobg.png" width="375px" >
            </dev>
            <li>
                <dev id="text">
                    <a class="logout" href="login form.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
		<div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-menu-rounded-50.png" height="35" width="35"><span>Sell Medicine</span></h1>
        </div>
		<div id="content">
		<form method="post">
			<div id="table-size">
				<table id="table">
						<tr id="table-header">
						<th>Medicine id</th>
						<th>Medicine name</th>
						<th>price per unit</th>
						<th>no of units</th>
						<th>Expiration date</th>
						<th>total price</th>
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
									echo "</tr>";
								}
							?>
				</table>
			</div>
				<input type="text" placeholder="search" id="search">
				<select name="search-box" id="search-box" size="28">
					<option value="panadol"></option>
					<option value="comtrex"></option>
					<option value="move"></option>
				</select>
				<label id="mi-label"><h3>Medicine ID:</h3></label>
				<input type="text" id="Medicine-id" name="medID" readonly style="background:#cccccc;">
				<label id="md-label"><h3>Medicine Name:</h3></label>
				<input type="text" placeholder="Medicine name" id="Medicine-name" name="medName">
				<label id="ppu-label"><h3>Price Per Unit:</h3></label>
				<input type="text" placeholder="Price per unit" id="price-per-unit" name="pricePerUnit">
				<label id="nou-label"><h3>No Of Units:</h3></label>
				<input type="text" placeholder="No of units" id="no-of-units" name="noOfUnits">
				<label id="d-label"><h3>Date:</h3></label>
				<input type="date" id="Date" name="date">
				<label id="tp-label"><h3>Total Price:</h3></label>
				<input type="text" id="total-price" name="totalPrice" readonly style="background:#cccccc;">
				<button id="addtocart" type="submit" onclick="addHtmlTableRow();" name="add">AddTocart</button>
				<button id="checkout" type="submit" onclick="updateHtmlTableSelectedRow();">check out</button>
				<button id="remove" type="submit" onclick="deleteSelectedRow();" name="remove">Remove</button>
			</form>
		<script>
			var rIndex=1,
				table=document.getElementById("table");
			
			function checkEmptyInput()
			{
				var isEmpty=false,
					medicineName=document.getElementById("Medicine-name").value,
					priceperunit=document.getElementById("price-per-unit").value,
					noofunits=document.getElementById("no-of-units").value,
					date=document.getElementById("Date").value;
					
					
				if(medicineName==="")
				{
					alert("Medicinen name can't be empty");
					isEmpty=true;
				}
				else if(priceperunit==="")
				{
					alert("Price per unit can't be empty");
					isEmpty=true;
				}
				else if(noofunits==="")
				{
					alert("No. of units can't be empty");
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
						medicineId=document.getElementById("Medicine-id").value,
						medicineName=document.getElementById("Medicine-name").value,
						priceperunit=document.getElementById("price-per-unit").value,
						noofunits=document.getElementById("no-of-units").value,
						date=document.getElementById("Date").value,
						totalprice=document.getElementById("total-price").value;
						
					
					cell1.innerHTML=medicineId;
					cell2.innerHTML=medicineName;
					cell3.innerHTML=priceperunit;
					cell4.innerHTML=noofunits;
					cell5.innerHTML=date;
					cell6.innerHTML=totalprice;
			
				
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
						document.getElementById("price-per-unit").value=this.cells[2].innerHTML;
						document.getElementById("no-of-units").value=this.cells[3].innerHTML;
						document.getElementById("Date").value=this.cells[4].innerHTML;
						document.getElementById("total-price").value=this.cells[5].innerHTML;
					
					};
				}
			}
			selectRowToInput()
			function deleteSelectedRow()
			{
				table.deleteRow(rIndex);
			}
		</script>
	
</tbody>

</table>

</div>

</body>

</html>