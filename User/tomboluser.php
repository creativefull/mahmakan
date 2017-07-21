<?php  if (!isset($_SESSION)) {
        session_start();
    }

    if (!isset($_SESSION['ShopidUs']))
    {
    echo '<a type="button" href="admin/index.php" class="btn btn-info menu pull-right">login</a>';
    } else
    {
     echo '<a href="admin/index.php" type="button" onClick="logout();" class="btn btn-danger menu pull-right">log out</a>'; 
    }

    ?>