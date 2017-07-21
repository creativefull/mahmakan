<?php
include_once('../ToMysql.php');
$idtype=$_POST["id"];
$typecode=$_POST["typecode"];
$typename=$_POST["typename"];
if ($idtype==0)
{


$connect = new mysqli($hostname,$username, $password,  $database);

$nilaiid=0;
$query = mysqli_query($connect,"SELECT id,typecode,typename FROM producttype Where typecode="."'".$typecode."'" ,MYSQLI_USE_RESULT) or die("Gagal mengambil data");

while($row = mysqli_fetch_assoc($query)) {
$nilaiid=$row["id"];	
echo '<script>$("#typename").val('.$row["typename "].')</script>';
echo "<script>MessageAction('Code Tersebut Sudah ada')</script>";
}
if ($nilaiid==0)
{
$connect->close();
$connect = new mysqli($hostname,$username, $password,  $database);

$query='INSERT INTO producttype(typecode,typename) select '
."'".$typecode."','".$typename."'";
	if ($connect->query($query) === TRUE) {
	    echo "<script>MessageAction('New record created successfully')</script>";
	} else {
	    echo "Error: " . $query . "<br>" . $connect->error;
	    echo "<script>MessageAction("."Error: " . $query . "<br>" . $connect->error.")</script>";
	}

}

}
else {
$connect = new mysqli($hostname,$username, $password,  $database);
$query='Update producttype set typecode="'.$typecode.'",typename="'.$typename.'" Where id='.$idtype;
	if ($connect->query($query) === TRUE) {
	    echo "<script>MessageAction('Update record successfully')</script>";
	} else {
	    echo "Error: " . $query . "<br>" . $connect->error;
	    echo "<script>MessageAction("."Error: " . $query . "<br>" . $connect->error.")</script>";
	}
}
?>

