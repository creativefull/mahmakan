<?php
	session_start();
	include('../koneksi.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM kasir WHERE username = '$username' AND password = '$password' ";
	$result = mysqli_query($db, $sql);
	$cek = mysqli_num_rows($result);
	if ($cek == 0 ) {
		$response = array(
			"status" => 404,
			'pesan'=> 'user tidak di temukan ~'
		);
		echo json_encode($response);
	} else {
		$hasil = mysqli_fetch_assoc($result);

		$_SESSION['namauserrr'] = $username;
		$_SESSION['idUs'] = $hasil['id'];
		// $_SESSION['usertypeid']=$hasil["usertypeid"];
		// $_SESSION["admin"]=$row["admin"];

		$_SESSION['username'] = $username;
		$_SESSION['cek_login'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['role'] = $hasil['role'];
		$_SESSION['name'] = $hasil ['name'];
		$response = array(
			"status" => 200,
			'pesan'=> 'login berhasil'
		);
		echo json_encode($response);
	}
?>