<?php
session_start();
include_once('../ToMysql.php');
$connect = new mysqli($hostname,$username, $password, $database);
$usr=$_POST['userid'];
$psw=$_POST['password'];

$statuslogin=0;
$result = mysqli_query($connect, 
 "call SP_cekCustomer('".$usr."','".$psw."')", MYSQLI_USE_RESULT);
while($row = mysqli_fetch_assoc($result)){                     
        $_SESSION['namauserrr'] = $row['Email'];
        $_SESSION['ShopidUs'] = $row['id'];
        $_SESSION['Email']=$row['Email'];
        $statuslogin=1;
      }
    echo $statuslogin; 
      
  //     echo $_SESSION['ShopidUs'];

?>