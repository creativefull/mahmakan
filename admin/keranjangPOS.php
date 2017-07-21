<?php  
    if (!isset($_SESSION)) {
        session_start();
    } 
    
   include_once('../ToMysql.php');
   include('../class/myclass.php');
   $obj = new myclass;
   
    ?>
      
    <?php    
  echo '<div class="pull-left"><a href="#" class="btn btn-default menu">Pilih Meja<span class="fa fa-th"></span></a>
  <span></span><a href="#" onClick="paymentdetailForm()"';
  echo ' class="btn btn-default menu">Payment<span class="glyphicon glyphicon-play"></span></a>';
echo '<a href="#" class="btn btn-default menu">Discount Item</a>
<a href="#" class="btn btn-default menu">Print Bill</a>
<a href="#" class="btn btn-default menu">Void Item</a></div>';
?>
<div class="title pull-left"><h4>Nota Penjualan </h4></div>
          <table class='<?php echo $obj->TableHeadHead();?>'>
          <tr class="yellow">
            <th>No</th>          
            <th>Product Name</th> 
            <th></th>
            <th class="text-right">Unit</th>
            <th class="text-right">Unit Price</th>
            <th class="text-right">Sub Total Price</th>
          </tr>
       <?php     
      $total = 0; 
      $no=0;

       $Tanggal=date("Y/m/d");  
      if (isset($_SESSION['items'])) {
        foreach ($_SESSION['items'] as $key => $val) {           
            $ProductName="";
            $Price=0;
            $idgabunganMsProductColordanSatuanid=$key;
            
            $PosisiPagar=strpos($key, "#");
            
            $ProductColorid= $obj->mid($key,0,strpos($key, "#"));
            
            $Satuanid=$obj->mid($key,strpos($key, "#")+1, strlen($key));
            
            $connect = new mysqli($hostname,$username, $password,  $database);
            
            $SatuanCode="";
            $SatuanName="";
            $ProductId=0;
            $image="";
            $sql="SELECT product.id,
  product.productcode,product.productname,
  product.image,producttype.typename ,product.price
  FROM product LEFT JOIN producttype ON product.producttypeid=producttype.id WHERE product.id=".$ProductColorid;

            $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT); 
            while($row = mysqli_fetch_assoc($result)) {
               $ProductName=$row["productname"];
               $Price=$row["price"];
               $SatuanCode="";
               $SatuanName="";
               $ProductId=$row["id"];
               $UnitStockCode="";
               $image=$row["image"];
            }
            
            mysqli_close($connect);
            $jumlah_harga = $Price * $val;
            $total += $jumlah_harga;

            $no++;
            
            
            ?>
                <tr>
                <td><?php echo $no ; ?></td>
               <?php
                echo '<td class="shrink" >'.$ProductName.'</td>';
               echo '<td style="width:30px;"><a href="#"  class="meta meta--preview menu"><img style="width:30px;height:20px;" class="meta__avatar" src="'.$image.'" alt="" /></a>';
                echo '</td>';
                ?>                
                <td class="text-right" ><?php echo number_format($val); ?></td> 
                <td class="text-right" ><?php echo  number_format($Price); ?>
                <td class="text-right" ><?php echo  number_format($Price*$val); ?> </td> 
                </tr>               
          <?php
                      
            }
              echo '<tr><td colspan="4">Total</td>                        
                        <td colspan="2" class="text-right"><strong>'.number_format($total).'</strong></td>
                    </tr>';
               
            }
             echo '<script>tpInformation("'.'<strong>Rp.'.number_format($total).',-</strong>'.'")</script>';
             echo '<script>$("#totalpesanan").val('.$total.')</script>';
            ?>
          <?php
          
          if($total == 0){ ?>
             
            <?php 
            } else 
            { ?>           

            <?php 
            }
        ?>
            </table> 
            <p><div align="right">
            
            </div></p>

          <!-- start: Row -->
            
        
          