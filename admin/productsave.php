<?php
include_once('../ToMysql.php');
$idprod=$_POST["id"];
$productcode=$_POST["productcode"];
$productname=$_POST["productname"];
$producttypeid=$_POST["producttypeid"];
$price=$_POST["price"];
$stock = $_POST['stock'];
$remaks=$_POST["remaks"];
if ($idprod==0)
{
	$connect = new mysqli($hostname,$username, $password,  $database);
	$nilaiid=0;
	$query = mysqli_query($connect,"SELECT product.id,
	product.productcode,product.productname,
	product.image,producttype.typename ,product.price
	FROM product LEFT JOIN producttype ON product.producttypeid=producttype.id
	Where product.productcode="."'".$productcode."'" ,MYSQLI_USE_RESULT) or die("Gagal mengambil data");
	while($row = mysqli_fetch_assoc($query)) {
		$nilaiid=$row["id"];	
		echo '<script>$("#productname").val('.$row["productname "].')</script>';
		echo "<script>MessageAction('Code Tersebut Sudah ada')</script>";
	}
	if ($nilaiid==0)
	{
	$connect->close();
	$connect = new mysqli($hostname,$username, $password,  $database);
	$query='INSERT INTO product(productcode,productname,producttypeid,price,remaks,stock) select '
	."'".$productcode."','".$productname."',".$producttypeid.",".$price.",'".$remaks.",'".$stock."'";
		if ($connect->query($query) === TRUE) {
		    echo "<script>MessageAction('New record created successfully')</script>";
		} else {
		    echo "Error: " . $query . "<br>" . $connect->error;
		    echo "<script>MessageAction("."Error: " . $query . "<br>" . $connect->error.")</script>";
		}

	} 
} else {
		$connect = new mysqli($hostname,$username, $password,  $database);
		$query='UPDATE product set productcode="'.$productcode.
		'",productname="'.$productname.'",producttypeid='.$producttypeid.'
		,price='.$price.',remaks="'.$remaks.'",stock="'.$stock.'" Where id='.$idprod;
		if ($connect->query($query) === TRUE) {
		    echo "<script>MessageAction('Update record successfully')</script>";
		} else {
		    echo "Error: " . $query . "<br>" . $connect->error;
		    echo "<script>MessageAction("."Error: " . $query . "<br>" . $connect->error.")</script>";
		}
	}
?>

