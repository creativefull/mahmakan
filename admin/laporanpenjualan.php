<?php  
    if (!isset($_SESSION)) {
        session_start();
  } 
    
   include_once('../ToMysql.php');
   include('../class/myclass.php');
   $obj = new myclass;
  
  $tanggal=$_POST["tanggal"];
  $tahun=$obj->mid($tanggal,6,4);
  $bulan=$obj->mid($tanggal,3,2);
  $tgl=$obj->mid($tanggal,0,2);
  $tglfilter=$tahun."/".$bulan."/".$tgl;
  $sql="SELECT product.`productname`, chartdtl.`unitprice`,chartdtl.`qty`,chartdtl.`unitprice` * chartdtl.`qty` gross FROM `chartdtl`
  INNER JOIN `charthd` ON `chartdtl`.`charthdid`=charthd.`id`
  INNER JOIN `product` ON chartdtl.`productid` 
  WHERE charthd.statusid=2 and charthd.transdate='".$tglfilter."'";

//echo $sql;

  $connect = new mysqli($hostname,$username, $password, $database);
           $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT); 
  ?>
  <div class="panel panelputih">
                  <div class="panel-heading">
                  Laporan Penjualan 
                  <br/>
                  Tanggal : <?php echo $tanggal; ?>
                  </div>
                    <div class="panel-body">   
  
  <br/>
  <div>
          <table style="width:1000px;" class='<?php echo $obj->TableHeadHead();?>'>
          <tr class="yellow">
            <th>No</th>          
            <th>Product Name</th> 
            <th class="text-right">Unit</th>
            <th class="text-right">Unit Price</th>
            <th class="text-right">Sub Penjualan</th>
          </tr>

          <?php

          $no=0;
          $total=0;

  while($row = mysqli_fetch_assoc($result))
    {
      $no=$no+1;
      $jumlah_harga = $row["qty"] * $row["unitprice"];
      $total += $jumlah_harga;
      echo '<tr>';
      echo '<td>'.$no.'</td>';
      echo '<td>'.$row["productname"].'</td>';
      ?>
      <td class="text-right" ><?php echo number_format($row["qty"]); ?></td> 
      <td class="text-right" ><?php echo  number_format($row["unitprice"]); ?>
      <td class="text-right" ><?php echo  number_format($row["unitprice"]*$row["qty"]); ?> </td 
      </tr>   
<?php
 } 
 echo '<tr><td colspan="4">Total</td>                        
                        <td colspan="2" class="text-right"><strong>'.number_format($total).'</strong></td>
                    </tr>';


           ?>

           </table>
           </div>
           </div> 
            <div align="left">
            