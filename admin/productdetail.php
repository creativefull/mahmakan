<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$active="";
$Db='../ToMysql.php';
$connect = new mysqli($hostname,$username, $password,  $database);
$query = mysqli_query($connect,"SELECT product.id,product.stock,
product.productcode,product.productname,product.remaks,
product.image,producttype.typename ,product.price,product.producttypeid
FROM product LEFT JOIN producttype ON product.producttypeid=producttype.id Where product.id=".$_POST["id"],MYSQLI_USE_RESULT) or die("Gagal mengambil data");
	$productcode="";
	$productname="";
	$typename="";
	$image="";
	$price=0;
	$stock=0;
	$producttypeid=0;
	$remaks="";
while($row = mysqli_fetch_assoc($query)) {
	$productcode=$row["productcode"];
	$productname=$row["productname"];
	$typename=$row["typename"];
	$price=$row["price"];
	$stock = $row['stock'];
	$image=$row["image"];
	$producttypeid=$row["producttypeid"];
	$remaks=$row["remaks"];
}
echo '<script>$("#headformid").html('."'".'<a href="#" onClick="saveproduct();" class="btn btn-info menu">Save</a><a href="#"  class="btn btn-info menu pull-right" onClick="LoadTableproduct();">Cancel</a>'."'".')</script>';

echo '<input type="hidden" id="idproduct" value='.$_POST["id"].' >';
$Class=" Style='Width:180px;'";
echo $obj->inputtext("Product Code ","productcode","Product Code ",$productcode,"",$Class,"class='form-control' maxlength='30'") ;

$Class=" Style='Width:280px;'";
echo $obj->inputtext("Product Name ","productname","Product Name ",$productname,"",$Class,"class='form-control'") ;

$cmb = $obj->comboProductType("producttypeid",$Db,$producttypeid,$typename,$active);
echo $obj->ComboSelectGeneralValue("Product Type ",$cmb,$producttypeid);

$Class=" Style='Width:280px;'";
echo $obj->inputtext("Price ","price","Price ",$price,"",$Class,"class='form-control'") ;
echo $obj->inputtext("Stock ","stock","Stock ",$stock,"",$Class,"class='form-control'") ;

$Class=" Style='Width:280px;'";
echo $obj->inputtextareaNew("Detail Product ","remaks","Remarks",$remaks,"",$Class," class='form-control' ");

?>