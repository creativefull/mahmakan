<?php
	include_once('../ToMysql.php');
	include('../class/myclass.php');
	$obj = new myclass;
	$connect = new mysqli($hostname,$username, $password,  $database);
	$query = mysqli_query($connect,"SELECT * FROM kasir Where id=".$_POST["id"],MYSQLI_USE_RESULT) or die("Gagal mengambil data");
	$name = "";
	$username = "";
	$password = "";
	$email = "";
	while($row = mysqli_fetch_assoc($query)) {
		$name = $row["name"];
		$username = $row["username"];
		$username = $row["username"];
		$password = $row["password"];
		$email = $row["email"];
	}

	echo '<script>$("#headformid").html('."'".'<a href="#" onClick="simpanKasir();" class="btn btn-info menu">Save</a><a href="#"  class="btn btn-info menu pull-right" onClick="LoadTableKasir();">Cancel</a>'."'".')</script>';
	echo '<input type="hidden" id="idkasir" value='.$_POST["id"].' >';
	$Class=" Style='Width:180px;'";
	echo $obj->inputtext("Name","name","Name",$name,"",$Class,"class='form-control'") ;
	echo $obj->inputtext("Username","username","Username",$username,"",$Class,"class='form-control'") ;
	echo $obj->inputtext("Password","password","Password",$password,"",$Class,"class='form-control' type = 'password'") ;
	echo $obj->inputtext("Email","email","Email",$email,"",$Class,"class='form-control'") ;
?>