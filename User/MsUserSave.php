<?php
session_start();
include "../Config/connect.php";
$connect = new mysqli($hostname,$username, $password, $database); 
echo $Vid =$_POST['id'];
echo $name=$_POST['userrname'];
echo $address=$_POST['useraddress'];
echo $city=$_POST['city'];
echo $phone=$_POST['phone'];
echo $hp=$_POST['hp'];
echo $jalan=$_POST['jalan'];
echo $blok=$_POST['blok'];
echo $nomor=$_POST['nomor'];
echo $rt=$_POST['rt'];
echo $rw=$_POST['rw'];
echo $kel=$_POST['kelurahan'];
echo $kec=$_POST['kecamatan'];
echo $kab=$_POST['kabupaten'];
echo $prop=$_POST['propinsi'];
echo $kdpos=$_POST['kodepos'];
echo $password=$_POST['confirpassword'];
echo $email=$_POST['email']; 
            
$result = mysqli_query($connect, 
 "call SP_CustomerSave(".$Vid.",'','".$name."','','','','".$address."','','".$city."','','".$phone."','','".$email."','','',
 '','','','','','','','','".$hp."','','','','','','','','".$jalan."','".$blok."','".$nomor."','".$rt."',
 '".$rw."','".$kel."','".$kec."','".$kab."','".$prop."','".$kdpos."','".$password."')", MYSQLI_USE_RESULT);
 ?>
 <script>
 alert("register anda berhasil!!");
 window.location="../index.php";
 </script>
              
              

           
