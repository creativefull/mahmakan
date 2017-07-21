 <?php 
  include_once('../ToMysql.php');
  $Vid=0;
  $connect = new mysqli($hostname,$username, $password, $database); 
  $Vid =$_POST['vId'];  
  $NmFileSave=$_POST["NmFileSave"];
  $json_obj = array();
  $result = " Update product set image='".$NmFileSave."' Where id=".$Vid;
  if ($connect->query($result) === TRUE) {
        echo $NmFileSave;
    } else {
        echo "Error: " . $result . "<br>" . $connect->error;
        echo "<script>MessageAction("."Error: " . $result . "<br>" . $connect->error.")</script>";
    }
?>