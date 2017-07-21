<?php  
    if (!isset($_SESSION)) {
        session_start();
    }     
   include_once('../ToMysql.php');
   include('../class/myclass.php');
   $obj = new myclass;
   $pesanan="T";
   $Tanggal=date("Y/m/d");  
   if (isset($_SESSION['items'])) {
    $pesanan="Y";
   }
 
   echo $pesanan;

   ?>