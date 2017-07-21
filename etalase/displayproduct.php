<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$Db="../class/myclass.php";
 
$connect = new mysqli($hostname,$username, $password,  $database);

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
while($row = mysqli_fetch_assoc($query)){ 
	$idunit=0;
	$formula="";
	$image='background:url(admin/'.$row["image"].');background-position:0 0;transition:all 0.5s ease-in 0;';
	$id="cat1".$row["id"];
	$lbl="lblcat".$row["id"];
    $display='<div class="imgbox" ><a href="#" ><div  style="'.$image.'" id="'.$id.'" class="catimage" ><label id="'.$lbl.'"  class="catlablel">'.$row["productname"]."(".$row["productcode"].")".'</label></div><div>'.$row["productname"].'</div><div>
    	'.'Harga :'.number_format($row["price"]).'</div>
    <a href="#" onClick="Chart('.$row["id"].','.$idunit.','."'"."add"."',".$row["id"].','."'".$formula."'".')"
     class="btn btn-success btn-xs pull-left btn-xs">Pesan</a></a>
    <a href="#" onClick="tpdtlProd('.$row["id"].');" class="btn btn-success btn-xs pull-right btn-xs">lihat Detail</a></a></div>';
 echo  $display;

}

 //

?>
