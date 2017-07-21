<?php
	include_once('../ToMysql.php');
	include('../class/myclass.php');
	$obj = new myclass;
	$connect = new mysqli($hostname,$username, $password,  $database);
	$query = mysqli_query($connect,"SELECT id,name,username,email,created_at FROM kasir",MYSQLI_USE_RESULT) or die("Gagal mengambil data");
	$var1="1";
	echo '<script>$("#headformid").html('."'".'<a href="#"  onClick="tambahKasir(0,'.$var1.');" class="btn btn-info menu">Tambah</a>'."'".')</script>';
?>

<table class=" table table-bordered dt-responsive" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th width='25%'>Name</th>
			<th >Username</th>
			<th >Email</th>
			<th >Created At</th>
			<th></th>
			<th></th>
		</tr>
		<tbody>
			<?php
				while($row = mysqli_fetch_assoc($query)) {
					echo '<tr>';
					echo '<td>'.$row["name"].'</td>';
					echo '<td>'.$row["username"].'</td>';
					echo '<td>'.$row["email"].'</td>';
					echo '<td>'.$row["created_at"].'</td>';
					echo '<td style="width: 40px;"><a href="#" onClick="tambahKasir('.$row["id"].',2);" class="btn btn-warning menu">Edit</a></td>';
					echo '<td style="width:50px"><a href="#" onClick="deleteKasir('.$row["id"].');" class="btn btn-warning menu">Delete</a></td>';       	
					echo '</tr>';
				}
			?>
		</tbody>
	</thead>
</table>