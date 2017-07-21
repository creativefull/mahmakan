<?php  
    if (!isset($_SESSION)) {
        session_start();
    } 
    
   include_once('../ToMysql.php');
   include('../class/myclass.php');
   $obj = new myclass;
   $total = 0; 
   $no=0;
   $susses="";
   $idheader=0;
   $Tanggal=date("Y/m/d");  
   if (isset($_SESSION['items'])) {
        $sql='INSERT INTO charthd(transnmbr,transdate,customerid,statusid ) 
        select CONCAT('.'"'.$_SESSION['ShopidUs'].'"'.',CONCAT(REPLACE(DATE(SYSDATE()),"-",""),REPLACE(TIME(SYSDATE()),":",""))),
         SYSDATE(),'.$_SESSION['ShopidUs'].','."1";
          $connect = new mysqli($hostname,$username, $password,  $database);          
        if ($connect->query($sql) === TRUE) {
          $susses="success";
   } else {
          echo "Error: " . $sql . "<br>" . $connect->error;
          echo "<script>MessageAction("."Error: " . $sql . "<br>" . $connect->error.")</script>";
   }
   
   $sql='select max(id) nilai from charthd where customerid ='.$_SESSION['ShopidUs'];
   $result = mysqli_query($connect, $sql, MYSQLI_USE_RESULT); 
   while($row = mysqli_fetch_assoc($result))
      {
        $idheader=$row["nilai"];
      }

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
            $sql="SELECT product.id,product.productcode,product.productname,product.image,producttype.typename ,product.price FROM product LEFT JOIN producttype ON product.producttypeid=producttype.id WHERE product.id=".$ProductColorid;
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
            $connect = new mysqli($hostname,$username, $password,  $database);
            $sql='INSERT INTO chartdtl(charthdid,productid,qty,unitprice,grossprice,discount,netsales
)  select (select max(id) from charthd where customerid ='.$_SESSION['ShopidUs'].'),'.$ProductId.','.$val.','.$Price.','.$Price * $val.",0,".$Price * $val;
              

      if ($connect->query($sql) === TRUE) {
          $susses="success";
      } else {
          echo "Error: " . $sql . "<br>" . $connect->error;
          echo "<script>MessageAction("."Error: " . $sql. "<br>" . $connect->error.")</script>";
      }            
            mysqli_close($connect);
            $jumlah_harga = $Price * $val;
            $total += $jumlah_harga;
            $no++;    
    }
    $connect = new mysqli($hostname,$username, $password,  $database);
    $sql='UPDATE charthd SET jumlahbelanja=(SELECT SUM(chartdtl.netsales) FROM chartdtl 
    WHERE chartdtl.charthdid=charthd.id) WHERE charthd.id='.$idheader;

    if ($connect->query($sql) === TRUE) {
          $susses="success";
      } else {
          echo "Error: " . $sql . "<br>" . $connect->error;
          echo "<script>MessageAction("."Error: " . $sql . "<br>" . $connect->error.")</script>";
    }        

}


unset($_SESSION['items']);
echo $idheader;

?>
            
           

            
        
          