<?php  if (!isset($_SESSION)) {
        session_start();
    }
    $sudah="";

    if (!isset($_SESSION['ShopidUs']))
    {
      $sudah="N";
    } else
    {
      $sudah="Y"; 
    }

    echo $sudah;
    
    ?>