<?php
	// include('../ToMysql.php');
	include('koneksi.php');

	$idtype=$_POST["id"];
	$name=$_POST["name"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$created_at = date('y-m-d H:m:s');

	if ($idtype == 0) {
		$query = "INSERT INTO kasir (name,username,password,email,role,created_at) VALUES ('$name','$username','$password','$email','kasir','$created_at') ";
		if (mysqli_query($db, $query)) {
			echo "<script>LoadTableKasir()</script>";
			// echo "<script>MessageAction('New record created successfully')</script>";
		} else {
			echo "Error: data gagal di simpan";
		}
	} else {
		$query = "UPDATE kasir SET name = '$name', username = '$username', password = '$password', email = '$email' WHERE id = '$idtype' ";
		if (mysqli_query($db, $query)) {
			echo "<script>LoadTableKasir()</script>";
			// echo "<script>MessageAction('New record created successfully')</script>";
		} else {
			echo "Error: data gagal di ubah";
		}
	}
?>