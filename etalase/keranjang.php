<?php  
    if (!isset($_SESSION)) {
        session_start();
    } 
    
   include_once('../ToMysql.php');
   include('../class/myclass.php');
   $obj = new myclass;
   /*
   <th>Product Id </th>
            <th>Product Color Id </th>
            <th>Color Id</th>
             <th>Kuantitas</th>
                         <th>Stock Unit </th> 
<th>id Item</th>
            */
    ?>
        <br />
        <br />
        
    <div class="title pull-left"><h3>Keranjang Anda</h3></div>
    <?php    
     echo '<div><a href="#" onClick="cekoutprocess();" class="btn btn-success menu pull-right">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a> <a href="#"  onClick="BackuToShop();" class="btn btn-warning menu pull-right"><span class="glyphicon glyphicon-triangle-left"></span>Continue Shopping</a></div>';
?>
          <table class="table table-hover" cellspacing="0" width="80%">
          <tr>
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
               $image='admin/'.$row["image"];
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
               // echo '<td><a class="thumbnail pull-left" href="#"> <img class="media-object" src="'.$image.'" style="width: 72px; height: 42px;"> </a></td>';

               echo '<td style="width:30px;"><a href="#"  class="meta meta--preview menu"><img style="width:30px;height:20px;" class="meta__avatar" src="'.$image.'" alt="" /></a>';
                  

                echo '</td>';
                ?>                
                <td class="text-right" ><?php echo number_format($val); ?></td> 
                <td class="text-right" ><?php echo  number_format($Price); ?>
                <td class="text-right" ><?php echo  number_format($Price*$val); ?> </td> 
                </tr>               
          <?php
                      
            }
              echo '<tr><td colspan="3">   </td>
                    <td><h3>Total</h3></td>
                        <td>   </td>
                        <td class="text-right"><h3><strong>Rp.'.number_format($total).',-</strong></h3></td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td></td>
                        <td></td></tr>';
               
            }
            
            ?>
          <?php
          
          if($total == 0){ ?>
             <td colspan="4" align="center"><?php echo "Keranjang Kosong!"; ?></td>
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
            
        
          