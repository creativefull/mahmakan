<?php session_start();
include_once('../class/myclass.php');
$obj = new myclass;
$paytypeid=$_POST['paytypeid'];
$payTypeName=$_POST["payTypeName"];
$active="";
$brs=$_POST["brs"];
$cmb="cmbpaytypeid".$brs;
$Db="../ToMysql.php";
echo $obj->comboPaymentType($cmb,$Db,$payTypeName,$paytypeid,$brs,$active);
?>