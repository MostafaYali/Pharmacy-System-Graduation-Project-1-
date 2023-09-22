<?php

session_start();

include"php/db_connection.php";

if(!isset($_SESSION["username"])){
    header("location:index.php");

}
?>
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="Title-Logo-nobg.png" type="image/x-icon" />
        <link rel="stylesheet" href="css/DS-main.css">
        <title>Pharmacy</title>
	<head>
	<body>
		<ul class="side-bar">
			<dev>
                    <img class="main-logo" src="Logo-nobg.png" width="375px" >
            </dev>
			<li>
                <dev id="text">
				    <a class="active" href="Dashboard.php"><img class="icon" src="icons/icons8-dashboard-60.png"><span>Dashboard</span></a>
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
                    <a class="seller" href="Employees.php"><img class="icon" src="icons/icons8-employees-64 (1).png"><span>Employees</span></a>
                </dev>  
			</li>
            <li>
                <dev id="text">
                    <a class="logout" href="index.php"><img class="icon" src="icons/icons8-logout-48.png"><span>logout</span></a>
                </dev>  
			</li>
		</ul>
        <div id="main-content">
            <h2><img id="page-name-logo" src="icons/icons8-menu-rounded-50.png" height="35" width="35"><span>Dashboard</span></h1>
        </div>

        <ul>
            <li>
                <div>
                    <div class="no-of-employee">
                        <div class="amount2">
                            <div class="cont2">
                                <img src="icons/icons8-employees-64.png">
                                <p>Total Employees</p>
                                 <?php
                              $query = "SELECT empID FROM emp ORDER BY empID";  
                                $query_run = mysqli_query($conn, $query);
                                   $row = mysqli_num_rows($query_run);        
                                     ?> 
                                <input type="text" value="<?php  echo ".$row.";?>" disabled>
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>
            <li>
                <div>
                    <div class="cashiers">
                        <div class="amount">
                            <img src="icons/icons8-cashier-64 (2).png">
                            <div class="cont">
                                <p>Cashiers</p>
                                <input type="text" value="3" disabled>
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>
            <li>
                <div>
                    <div class="best-seller">
                        <div class="amount">
                            <img src="icons/icons8-best-seller-60.png">
                            <div class="cont">
                            <p>Out Of Stock</p>
                                <?php
                              $query = "SELECT medID FROM med ORDER BY medID";  
                                $query_run = mysqli_query($conn, $query);
                                   $row = mysqli_num_rows($query_run);        
                                     ?>
                                <input type="text" value="<?php  echo ".$row.";?>" disabled>
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>
            <li>
                <div>
                    <div class="medicines1">
                        <div class="amount">
                            <img src="icons/icons8-medicines-641.png">
                            <div class="cont">
                            <p>Total Medicines</p>
                                <?php
                              $query = "SELECT medID FROM med ORDER BY medID";  
                                $query_run = mysqli_query($conn, $query);
                                   $row = mysqli_num_rows($query_run);        
                                     ?>
                                <input type="text" value="<?php  echo ".$row.";?>" disabled>
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>
            <li>
                <div>
                    <div class="pharmacists">
                        <div class="amount">
                            <img src="icons/icons8-pharmacist-64.png">
                            <div class="cont">
                                <p>Pharmacists</p>
                                <input type="text" value="10" disabled>
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>
            <li>
                <div>
                    <div class="total-bills">
                        <div class="amount">
                            <img src="icons/icons8-bill-60.png">
                            <div class="cont">
                            <p>Total Invoice</p>
                                <?php
                              $query = "SELECT medID FROM med ORDER BY medID";  
                                $query_run = mysqli_query($conn, $query);
                                   $row = mysqli_num_rows($query_run);        
                                     ?>
                                <input type="text" value="<?php  echo ".$row.";?>" disabled>
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>
            <li>
                <div>
                    <div class="companies">
                        <div class="amount">
                            <img src="icons/icons8-company-64.png">
                            <div class="cont">
                                <p>Total supplers</p>
                                <?php
                              $query = "SELECT medID FROM med ORDER BY medID";  
                                $query_run = mysqli_query($conn, $query);
                                   $row = mysqli_num_rows($query_run);        
                                     ?>
                                <input type="text" value="<?php  echo ".$row.";?>" disabled>    
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>
            <li>
                <div id="table-size">
                    <table id="table">
                    <?php
                           $show = "SELECT * FROM invoicers";
		                   	$result = mysqli_query($conn,$show);
		 	
		                       	if( isset($_POST['id']) )
		                     	{
				                $medID = $_POST['id'];
			          }
                 			if( isset($_POST['SM']) )
			            {
				                $medName = $_POST['SM'];
			                    }
		                          	if( isset($_POST['TA']) )
			                          {
		                 		$medBP = $_POST['TA'];
			                      }
		                      ?>
                        <tr id="table-header">
                            <th>Bill</th>
                            <th>Seller Name</th>
                            <th>Total Amount</th>
                        </tr>
                        <?php
								while ( $row = mysqli_fetch_array($result) )
								{
									echo "<tr>";
										echo "<td>".$row[0]."</td>";
										echo "<td>".$row[1]."</td>";
										echo "<td>".$row[2]."</td>";
									echo "</tr>";
								}
							?>
                    </table>
                </div>
            </li>
            <li>
                <div>
                    <div class="expired">
                        <div class="amount3">
                            <img class="exp-icon" src="icons/icons8-expired-100.png">
                            <div class="cont3">
                                <p>Expired</p>
                                <?php
                              $query = "SELECT medID FROM med ORDER BY medID";  
                                $query_run = mysqli_query($conn, $query);
                                   $row = mysqli_num_rows($query_run);        
                                     ?>
                                <input type="text" value="<?php  echo ".$row.";?>" disabled>
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>
            <li>
                <div>
                    <div class="total-selles">
                        <div class="amount4">
                            <img src="icons/icons8-total-sales-48.png">
                            <div class="cont4">
                            <?php
                                require 'php/db_connection.php';
                                if($conn){
                                    $date=date('Y-m-d');
                                
                              ?>
                              <p>Total Selles</p>
                                <?php
                      $total = 0;
                      $query = "SELECT totalPrice FROM selling ";
                      $result = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_array($result))
                        $total = $total + $row['totalPrice'];
                                }
                            
                                   ?>
                                <input type="text" value="<?php  echo ".$total.";?>" disabled>
                            </div>  
                        </div>
                    </div>
                </div>    
            </li>    
        </ul>



    </body>
</html>

 