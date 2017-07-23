<?php
	include('koneksi.php');
	$id = $_POST["id"];
	$query = "DELETE FROM product WHERE id = '$id'";
	if (mysqli_query($db, $query)) {
		$response = array(
			'status' => 200,
			'pesan'=>'Data berhasil di hapus'
		);
		echo json_encode($response);
	} else {
		$response = array(
			'status' => 503,
			'pesan'=>'Data gagal di hapus'
		);
		echo json_encode($response);
	}
?>