<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      

$Db="../class/myclass.php";

$count =0;
$connect = new mysqli($hostname,$username, $password, $database);
         $result = mysqli_query($connect, "SELECT count(*) Jumlah FROM product ", MYSQLI_USE_RESULT); 
         while($row = mysqli_fetch_assoc($result)) 
         { 
          $count =$row["Jumlah"];
        }

if ($_POST['pageId']==0)
{
 $hal=1;
}

$connect->close();

/*
if ($_POST["Vid"]=="undefined")
{
  $Vid=0;   
}
*/

if ($_POST['pageId']!=0)
{
 $hal=$_POST['pageId'];
}

$recordsPerPage=$_POST['recordsPerPage'];

if ($_POST['recordsPerPage']=="undefined")
{
 $recordsPerPage=10;
}

$start = ($hal-1) * $recordsPerPage;
$Pagein=$obj->ProductPage($_POST['pageId'],$recordsPerPage,$count);
$connect = new mysqli($hostname,$username, $password,  $database);
$query = mysqli_query($connect,"SELECT product.id,
product.productcode,product.productname,
product.image,producttype.typename ,product.price
FROM product LEFT JOIN producttype ON product.producttypeid=producttype.id limit ".$start.",".$recordsPerPage,MYSQLI_USE_RESULT) or die("Gagal mengambil data");
$var1="1"; 
echo '<script>$("#headformid").html('."'".'<a href="#"  onClick="detailproduct(0,'.$var1.');" class="btn btn-info menu">Tambah</a> <a href="#" onClick="RefreshProd();" class="btn btn-info menu">Refresh</a>'."'".')</script>';

?>
<table class="table table-bordered dt-responsive" cellspacing="0" width="100%">
			<thead>
        <tr>
				<th width='30%'>Product Code</th>
				<th >Product Name</th>
        <th >Product Type</th>
        <th >Image</th>
        <th >Harga</th>
				<th></th>
        </tr>
        </thead>
         <tbody>
         <?php
         $brs=0;
         while($row = mysqli_fetch_assoc($query)) {
         	$brs=$brs+1;
          $ImageCatute="ImageCatute".$brs;
          echo '<tr>';
         	echo '<td>'.$row["productcode"].'</td>';
          echo '<td>'.$row["productname"].'</td>';
          echo '<td>'.$row["typename"].'</td>';
          echo '<td><span id="'.$ImageCatute.'"></span><span class="meta meta--preview"><img style="width:50px;height:30px;" class="meta__avatar" src="'.$row["image"].'" alt="" /></span><a href="#" onClick="UploadPictureProduct('.$brs.','.$row["id"].')" class="btn btn-warning menu pull-right">Upload</a></td>';
          echo '<td>'.$row["price"].'</td>';
          echo '<td style="width: 140px;"><a href="#" onClick="detailproduct('.$row["id"].',2);" class="btn btn-warning menu">Edit</a> <a href="#" class="btn btn-warning menu">Delete</a></td>';       	
         	echo '</tr>';
         }
         ?>
        </tbody>
 </table>
 <?php
 echo '<ul class="pagination">';
 echo  $Pagein;
 echo '</ul>';
 ?>
 