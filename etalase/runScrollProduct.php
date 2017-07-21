<?php
   include_once('../ToMysql.php');
   include('../class/myclass.php');
   $obj = new myclass;
   $where=" Order By product.producttypeid,product.productname ";
   if ($_POST["typeid"]!=0)
   {
   	$where=" Where product.producttypeid=".$_POST["typeid"]." Order By product.producttypeid,product.productname ";
   }
	$connect = new mysqli($hostname,$username, $password,  $database);
	$query = mysqli_query($connect,"SELECT product.id,
	product.productcode,product.productname,
	product.image,producttype.typename ,product.price
	FROM product LEFT JOIN producttype ON product.producttypeid=producttype.id ".$where,MYSQLI_USE_RESULT) or die("Gagal mengambil data");
	$var1="1"; 

	//limit ".$start.",".$recordsPerPage
	while($row = mysqli_fetch_assoc($query)){ 
	  $id="cat1".$row["id"];
	  $lbl="lblcat".$row["id"];
	  echo '<script>slideupCat("'.$id.'","'.$lbl.'")</script>';
	}      
?>
