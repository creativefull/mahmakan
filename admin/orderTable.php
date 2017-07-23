<?php
	include_once('../ToMysql.php');
	include('../class/myclass.php');
	$obj = new myclass;
	$connect = new mysqli($hostname,$username, $password,  $database);
	$query = mysqli_query($connect, "SELECT charthd.*,MsCustomer.CustName FROM charthd LEFT JOIN MsCustomer ON charthd.customerid = MsCustomer.id ORDER BY charthd.id ASC");
	$var1="1";
	// echo '<script>$("#headformid").html('."'".'<a href="printOrder.php" class="btn btn-info menu">Print</a>'."'".')</script>';
?>

<table class=" table table-bordered dt-responsive" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>No Nota</th>
			<th>Customer</th>
			<th>Total</th>
			<th>Date</th>
			<th></th>
		</tr>
		<tbody>
			<?php
				while($row = mysqli_fetch_assoc($query)) {
					echo '<tr>';
					echo '<td>'.$row["transnmbr"].'</td>';
					echo '<td>'.$row["CustName"].'</td>';
					echo '<td>'.$row["jumlahbelanja"].'</td>';
					echo '<td>'.$row["transdate"].'</td>';
					echo '<td><a href="orderPrint.php?id='.$row['id'].'" target = "_blank" class="btn btn-warning menu">Print</a> </td>';
				}
			?>
		</tbody>
	</thead>
</table>