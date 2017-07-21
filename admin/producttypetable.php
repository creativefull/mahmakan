<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$connect = new mysqli($hostname,$username, $password,  $database);
$query = mysqli_query($connect,"SELECT id,typecode,typename FROM producttype",MYSQLI_USE_RESULT) or die("Gagal mengambil data");
$var1="1";
echo '<script>$("#headformid").html('."'".'<a href="#"  onClick="detailproductType(0,'.$var1.');" class="btn btn-info menu">Tambah</a>'."'".')</script>';

?>
<table class=" table table-bordered dt-responsive" cellspacing="0" width="100%">
			<thead>
        <tr>
				<th width='10%'>Product Type Code</th>
				<th >Product Type Name</th>
				<th></th>
        <th></th>
               </tr>
             </thead>
         <tbody>
         <?php
         while($row = mysqli_fetch_assoc($query)) {
         	echo '<tr>';
         	echo '<td>'.$row["typecode"].'</td>';
          	echo '<td>'.$row["typename"].'</td>';
          	echo '<td style="width: 40px;"><a href="#" onClick="detailproductType('.$row["id"].',2);" class="btn btn-warning menu">Edit</a></td>';
            echo '<td style="width:50px"><a href="#" class="btn btn-warning menu">Delete</a></td>';       	
         	echo '</tr>';
         }
         ?>
        </tbody>
 </table>
