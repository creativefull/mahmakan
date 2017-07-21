<?php  
    if (!isset($_SESSION)) {
        session_start();
  } 
    
   include_once('../ToMysql.php');
   include('../class/myclass.php');
   $obj = new myclass;
   
   
   ?>
   <br/>
   <div class="container">
   <div class="panel panelputih">
   <div class="panel-heading">
   <a href="#" onClick="chartdone();" class="btn btn-info menu">Lanjutkan Proses Pembayaran</a>
   <?php  
   ?>
   </div>
  <div class="panel-body">
  <div class="col-md-12">
    <div class="col-md-8">
    <?php


    $Class=" Style='Width:280px;' class='text-right' disabled  ";
    echo $obj->inputtext("Gross Total ","TotalGross","Gross Total ",number_format($_POST["totalpesanan"]),"",$Class,"class='form-control text-right' ") ;

    $discount1=0;
    $discount2=0;
    
    $active="";
   $Class=" Style='Width:140px;'  class='text-right'";
   echo $obj->inputtextMultiVar("Sub total Discount","SubdiscAmount","Sub total Discount",$discount1,"SubdiscPersen","Discount %",$discount2,$active,$Class,"class='form-control'");


    $Netsales=number_format($_POST["totalpesanan"]);

    echo "<input type='hidden' id='totpesan' value=".$_POST["totalpesanan"].">";

    $Class=" Style='Width:280px;' class='text-right'   ";
    echo $obj->inputtext("Net Sale ","Netsales","Net Sale ",$Netsales,"",$Class,"class='form-control text-right' ") ;

    $PPN=10;
    $PPNAmount=(10/100) * $_POST["totalpesanan"];
    $Class=" Style='Width:280px;' class='text-right'   ";
    

    $Class=" Style='Width:140px;'  class='text-right'";
   echo $obj->inputtextMultiVar("PPN","PPN","PPN",$PPN,"PPN Amount","PPN Amount",$PPNAmount,$active,$Class,"class='form-control'");

   $totalyghrs=$_POST["totalpesanan"]+$PPNAmount;
   $Class=" Style='Width:280px;' class='text-right'   ";
    echo $obj->inputtext("Total yg harus dibayarkan ","totalyghrs","Total yg harus dibayarkan ",$totalyghrs,"",$Class,"class='form-control text-right' ") ;

    $JmlByr=0;
   $Class=" Style='Width:280px;' class='text-right'   ";
    echo $obj->inputtext("Jumlah Bayar ","JmlByr","Net Sale ",$JmlByr,"",$Class,"class='form-control text-right' ") ;
    ?>
    </div>
  </div>
  <?php
  //onClick="chartdone()
  $brs=0;
  ?>

  <a href="#" onClick="Addrowpayment();" class="btn btn-info menu"><i class="fa fa-plus-square-o btn-xs" ></i>Tambah</a>
   <table id="multipayment" class='<?php echo $obj->TableHeadHead();?>'>
			<thead>
        <tr class="yellow item-row">
		    <th width='30%'>Payment Type</th>
		    <th>Nomor</th>
        <th class="text-right" style="display:none;">Saldo</th>
        <th class="text-right">Jumlah Bayar</th>
        <th></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        <?php
        echo "<input type='hidden' id='totrow' value=".$brs.'>'; 
        ?>
        </table>
        </div>
       </div>
</div>

<br/>

<br/>
<br/>
<br/>
