<?php
	// Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");
	// Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=order.xls");

	include_once('../ToMysql.php');
	// include('../class/myclass.php');
	// $obj = new myclass;
	$connect = new mysqli($hostname,$username, $password,  $database);
	$query = mysqli_query($connect,"SELECT chartdtl.qty,chartdtl.grossprice,chartdtl.discount
		,product.id, product.productname,product.productcode,product.producttypeid,product.price FROM chartdtl LEFT JOIN product ON chartdtl.productid = product.id ",MYSQLI_USE_RESULT) or die("Gagal mengambil data");
	$var1="1";
?>

<table class=" table table-bordered dt-responsive" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Product Code</th>
			<th>Product</th>
			<th>Price</th>
			<th>QTY</th>
			<th>Gross Price</th>
			<th>Discount</th>
		</tr>
		<tbody>
			<?php
				while($row = mysqli_fetch_assoc($query)) {
					echo '<tr>';
					echo '<td>'.$row["productcode"].'</td>';
					echo '<td>'.$row["productname"].'</td>';
					echo '<td>'.$row["price"].'</td>';
					echo '<td>'.$row["qty"].'</td>';
					echo '<td>'.$row["grossprice"].'</td>';
					echo '<td>'.$row["discount"].'</td>';
				}
			?>
		</tbody>
	</thead>
</table>