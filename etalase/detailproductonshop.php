<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
$productid=$_POST["id"];

$where=" WHERE product.id=".$productid;

$connect = new mysqli($hostname,$username, $password,  $database);
$query = mysqli_query($connect,"SELECT product.id,
product.productcode,product.productname,product.remaks,
product.image,producttype.typename ,product.price,product.producttypeid
FROM product LEFT JOIN producttype ON product.producttypeid=producttype.id ".$where,MYSQLI_USE_RESULT) or die("Gagal mengambil data");
    $productcode="";
    $productname="";
    $typename="";
    $image="";
    $price=0;
    $producttypeid=0;
    $remaks="";
while($row = mysqli_fetch_assoc($query)) {
    $productcode=$row["productcode"];
    $productname=$row["productname"];
    $typename=$row["typename"];
    $price=$row["price"];
    $image="admin/".$row["image"];
    $producttypeid=$row["producttypeid"];
    $remaks=$row["remaks"];

}
echo '<input type="hidden" value='.$productid.' id="prodid">'
?>
<div class="container">
<div class="row">
<div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <?php
                echo '<h3 class="modal-title">'.$productname.'</h3>';
                ?>
            </div>
            <?php
    echo '<div class="col-md-4 product_img">
                        <img src="'.$image.'" class="img-responsive"></div>';
                        ?>
                    
                    <div class="col-md-8 product_content">                       
                        <?php
                        echo '<h4>Product Code : <span>'.$productcode.'</span></h4>';
                        ?>                      
                            <?php
                            echo '<p> '.$remaks.'</p>';
                            ?>

                       <?php
                    echo '<h3 class="cost"><small>Rp.'.$price.',-</small></h3>';
                    ?>

                        <div class="row">     
                            <div class="col-md-2 col-sm-12">
                            Qty :
                            </div>                       
                            <div class="col-md-2 col-sm-12">
                            <input type="text" style="width:40px" id="qtypesan" name="qtypesan" />
                                
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="button" onclick="pesanBanyak();" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Tambah ke Cart</button>
                            
                        </div>
                        <br/>
                        <br/>
                        
                    </div>
                </div>
            </div>