<?php 
  include_once('../ToMysql.php');
  $Vid=0;
  $connect = new mysqli($hostname,$username, $password, $database); 
  $charthdid=$_POST["charthdid"];
  $paymenttypeid=$_POST["paymenttypeid"];
  $nominal=$_POST["nominal"];
  $nomorkartu=$_POST["nomorkartu"];

  $result = " INSERT INTO `chartpaymentdtl`(`charthdid`,`paymenttypeid`,`nominal`,`nomorkartu`) select ".$charthdid.",".$paymenttypeid.",".$nominal.",'".$nomorkartu."'";

  if ($connect->query($result) === TRUE) {
        echo $nomorkartu;
    } else {
        echo "Error: " . $result . "<br>" . $connect->error;
        echo "<script>MessageAction("."Error: " . $result . "<br>" . $connect->error.")</script>";
    }


    
    
?>