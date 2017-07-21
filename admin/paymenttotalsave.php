<?php 
  include_once('../ToMysql.php');
  $charthdid=$_POST["charthdid"];
  $jumlahbyr=$_POST["jumlahbyr"];
  $connect = new mysqli($hostname,$username, $password, $database); 
  $result = " update charthd set jumlahbayar=".$jumlahbyr.",statusid=2 Where id=".$charthdid;

  if ($connect->query($result) === TRUE) {
        echo $jumlahbyr;
    } else {
        echo "Error: " . $result . "<br>" . $connect->error;
        echo "<script>MessageAction("."Error: " . $result . "<br>" . $connect->error.")</script>";
    }  
?>