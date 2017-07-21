<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$connect = new mysqli($hostname,$username, $password,  $database);
$query = mysqli_query($connect,"SELECT id,typecode,typename FROM producttype Where id=".$_POST["id"],MYSQLI_USE_RESULT) or die("Gagal mengambil data");
$typecode="";
$typename="";
while($row = mysqli_fetch_assoc($query)) {
	$typecode=$row["typecode"];
	$typename=$row["typename"];
}
echo '<script>$("#headformid").html('."'".'<a href="#" onClick="saveproducttype();" class="btn btn-info menu">Save</a><a href="#"  class="btn btn-info menu pull-right" onClick="LoadTableproduxtType();">Cancel</a>'."'".')</script>';

echo '<input type="hidden" id="idtype" value='.$_POST["id"].' >';
$Class=" Style='Width:180px;'";
echo $obj->inputtext("Product Type Code ","typecode","Product Type Code ",$typecode,"",$Class,"class='form-control' maxlength='2'") ;

$Class=" Style='Width:280px;'";
echo $obj->inputtext("Product Type Name ","typename","Product Type Code ",$typename,"",$Class,"class='form-control'") ;

?>