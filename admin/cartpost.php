<?php
    if (!isset($_SESSION)) {
        session_start();
    }   

    if (isset($_POST['act']))
     {
        $act = $_POST['act'];
              
        if ($act == "add") {
            if (isset($_POST['Productid'])) {
                $Productid = $_POST['Productid'];          
                $UnitId=$_POST["UnitId"];       
                $Code="";
                $Code=$Productid."#".$UnitId;       
                if (isset($_SESSION['items'][$Code])) {
                    $_SESSION['items'][$Code] += 1;
                } else {
                    $_SESSION['items'][$Code] = 1; 
                }
            }
        } elseif ($act == "plus") {
            if (isset($_POST['Productid'])) {
                $Productid = $_POST['Productid'];
                $UnitId=$_POST["UnitId"];
                $Code="";
                $Code=$Productid."#".$UnitId;     
                
                if (isset($_SESSION['items'][$Code])) {
                    $_SESSION['items'][$Code] += 1;
                }
            }
        } elseif ($act == "min") {
            if (isset($_POST['Productid'])) {
                $Productid = $_POST['Productid'];
                $UnitId=$_POST["UnitId"];
                
                $Code="";
                $Code=$Productid."#".$UnitId;     
                
                if (isset($_SESSION['items'][$Code])) {
                    $_SESSION['items'][$Code] -= 1;
                }
            }
        } elseif ($act == "del") {
            if (isset($_POST['Productid'])) {
                $Productid = $_POST['Productid'];
                $UnitId=$_POST["UnitId"];
                
                $Code="";
                $Code=$Productid."#".$UnitId;     
                
                if (isset($_SESSION['items'][$Code])) {
                    unset($_SESSION['items'][$Code]);
                }
            }
        } elseif ($act == "clear") {
            if (isset($_SESSION['items'])) {
                foreach ($_SESSION['items'] as $key => $val) {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         
        //header ("location:" . $ref);
    }
    echo "Add to chart success !!!";
?>