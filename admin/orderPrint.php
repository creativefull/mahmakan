<?php
	include('koneksi.php');
	include('../laporan-pdf/fpdf.php');
	$id = $_GET['id'];
	$query1 = mysqli_query($db,"SELECT charthd.*,MsCustomer.CustName FROM charthd LEFT JOIN MsCustomer ON charthd.customerid = MsCustomer.id WHERE charthd.id = '$id' ");
	$row = mysqli_fetch_assoc($query1);
	$query2 = mysqli_query($db, "SELECT chartdtl.qty,chartdtl.grossprice,chartdtl.discount
		,product.id, product.productname,product.productcode,product.producttypeid,product.price FROM chartdtl LEFT JOIN product ON chartdtl.productid = product.id WHERE chartdtl.charthdid = '$id'");
	//Inisiasi untuk membuat header kolom
	$column_nota = "";
	$column_nama = "";
	$column_harga = "";
	$column_qty = "";
	$column_subtotal = "";
	$column_total = "Rp. ".$row['jumlahbelanja'];
?>
<table class=" table table-bordered dt-responsive" border="1" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th style="text-align : left;">No Nota  :  <?php echo $row['transnmbr']; ?></th>
			<!-- <th><?php ?></th> -->
			<th colspan="3" style="text-align : right; margin-right : 10px;"><?php echo $row['transdate']?></th>
		</tr>
		<tr>
			<th>Daftar Barang</th>
			<th>Harga</th>
			<th>QTY</th>
			<th>Sub Total</th>
		</tr>
		<?php
			while($r = mysqli_fetch_assoc($query2)) {
				echo '<tr>';
				echo '<td>'.$r["productname"].'</td>';
				echo '<td style="text-align : center;">'."Rp.".$r["price"].'</td>';
				echo '<td style="text-align : center;">'.(int)$r["qty"].'</td>';
				echo '<td style="text-align : right;">'."Rp.".$r["grossprice"].'</td>';
				
			}
		?>
		<tr>
			<th colspan="3">Total : </th>
			<th><?php echo "Rp. ".$row['jumlahbelanja']; ?></th>
		</tr>
		<tr>
			<th colspan="3">User</th>
			<th ><?php echo $row['CustName']; ?></th>
		</tr>
	</thead>
</table>