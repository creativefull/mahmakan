<?php if (!isset($_SESSION)) {
        session_start();
    } 
    
include_once('ToMysql.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">    
    <title>E-Order  | Sales </title>
  <!-- Bootstrap core CSS -->
  <?php

  ?>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/shop.css" rel="stylesheet">
    <link href="assets/DatePicker/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/Font-Awesome-4.3.0/css/font-awesome.min.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
       <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js" type="text/javascript"></script>
    <script src="assets/DatePicker/bootstrap-datepicker.min.js" type="text/javascript"></script>   

     
   <style type="text/css">
     
     
   </style>
   
    <script type="text/javascript">
    $(document).ready(function(){
     buattombolLogin();  
     tampiletalase(0);
     callslite(0);    
   });
   
   function RecallEtalase($typeid)
   {
    tampiletalase($typeid);
    callslite($typeid);  
   }
   function tampiletalase(typeid)
   {
    var dataString='id='+0+"&typeid="+typeid;       
         $("#displayProduct").html
         ('Loading <img src="img/loading6.gif" />');
         $("#displayProduct").show();
         $.ajax({
         type: "POST",
         url: "etalase/displayproduct.php",
         data: dataString,
         cache: false,
         success: function(result){  
            $("#displayKeranjang").hide();
            $("#displayProduct").html(result);        
            $("#displayProduct").show();                                 
         }
         });
       }

   function tpdtlProd(id)
   {
    var dataString='id='+id;       
    $('#lookmodal').modal('toggle');
    $('#lookmodal').modal('show');
    $(".modal-dialog").width(1200 );  
         $.ajax({
         type: "POST",
         url: "etalase/detailproductonshop.php",
         data: dataString,
         cache: false,
         success: function(result){  
            $("#loadmodal").html(result);                                       
         }
         });
   } 

   function slideupCat($cat,$label){
    		$('#'+$cat).mouseover(function(){			
    			$(this).css('background-position','0 -70px').css('transition','all 0.5s ease-in').css('-webkit-transition','all 0.5s ease-in').css('-moz-transition','all 0.5s ease-in').css('-o-transition','all 0.5s ease-in').css('-ms-transition','all 0.5s ease-in');
    			$('#'+$label).css('margin-top','80px').css('transition','all 0.5s ease-in').css('-webkit-transition','all 0.5s ease-in').css('-moz-transition','all 0.5s ease-in').css('-o-transition','all 0.5s ease-in').css('-ms-transition','all 0.5s ease-in');
    		});
    		$('#'+$cat).mouseout(function(){			
    			$(this).css('background-position','0 0').css('transition','all 0.5s ease-in').css('-webkit-transition','all 0.5s ease-in').css('-moz-transition','all 0.5s ease-in').css('-o-transition','all 0.5s ease-in').css('-ms-transition','all 0.5s ease-in');
    			$('#'+$label).css('margin-top','150px').css('transition','all 0.5s ease-in').css('-webkit-transition','all 0.5s ease-in').css('-moz-transition','all 0.5s ease-in').css('-o-transition','all 0.5s ease-in').css('-ms-transition','all 0.5s ease-in');
    		});
    	}
  
    function pesanBanyak()
    { 
      var jumlah=$("#qtypesan").val();
      var productid=$("#prodid").val();
      var i=0;
      //alert(jumlah);
      if (jumlah!="QTY")
      {
        for (i = 0; i < jumlah; i++) {            
           BanyakChart(productid,0,"add",0,0); 
          BackuToShop();   
         }
      }
    }

    function BanyakChart(Productid,UnitId,act,GambarProductId,VaraMeterFormulas)
      {
       var dataString='Productid='+Productid+"&act="+act+"&UnitId="+UnitId;
       var dd;
        $("#displayProduct").hide();
        $("#hihh").html
         ('Proces........! <img src="img/loading6.gif" />');
         $("#hihh").show();
          postUrl="etalase/cartpost.php";          
          $.ajax({
            type: "POST",
            url: postUrl,
            data: dataString,
            cache: false,
            success: function(result){  
             $("#lookmodal").modal('hide');
            BackuToShop();               
           }
           
          });         
      }
    
    function callslite(typeid)
      {
        var dataString="start="+0+"&typeid="+typeid;  
        var postUrl="etalase/runScrollProduct.php";
              $.ajax({
                type: "POST",
                url: postUrl,
                data: dataString,
                cache: false,
                success: function(result){
                 $("#hihh").html(result); 

                }
                });
           
      }

      function TpKeranjang()
      {
        var dataString="start="+0;  
        var postUrl="etalase/keranjang.php";
              $.ajax({
                type: "POST",
                url: postUrl,
                data: dataString,
                cache: false,
                success: function(result){
                $("#displayProduct").hide();
                $("#displayKeranjang").html(result); 
                $("#displayKeranjang").show();   
                }
            });
           
      }

    function BackuToShop()
    {
      $("#displayKeranjang").hide();
      $("#displayProduct").show();   
    }

    function Chart(Productid,UnitId,act,GambarProductId,VaraMeterFormulas)
      {
       var dataString='Productid='+Productid+"&act="+act+"&UnitId="+UnitId;
       var dd;
        $("#displayProduct").hide();
        $("#hihh").html
         ('Proces........! <img src="img/loading6.gif" />');
         $("#hihh").show();
          postUrl="etalase/cartpost.php";          
          $.ajax({
            type: "POST",
            url: postUrl,
            data: dataString,
            cache: false,
            success: function(result){  
              $("#hihh").hide();
              BackuToShop();
            
           }
           
          });         
      }

  function save_Register()
  {
  
      validasiForm();
      var dataString;
      var id=0;
      var name=$("#userrname").val();
      var address=$("#useraddress").val();
      var city=$("#city").val();
      var phone=$("#phone").val();
      var email=$("#email").val();
      var hp=$("#hp").val();
      var jalan=$("#jalan").val();
      var blok=$("#blok").val();
      var nomor=$("#nomor").val();
      var rt=$("#rt").val();
      var rw=$("#rw").val();
      var kel=$("#kelurahan").val();
      var kec=$("#kecamatan").val();
      var kab=$("#kabupaten").val();
      var prop=$("#propinsi").val();
      var kdpos=$("#kodepos").val();
      var password=$("#confirpassword").val();            
      dataString="Vid="+id+"&vName="+name+"&vAddress="+address+"&vCity="+city+"&vPhone="+phone+"&vEmail="+email+"&vHp="+hp+"&vJalan="+jalan+
      "&vBlok="+blok+"&vNomor="+nomor+"&vRT="+rt+"&vRw="+rw+"&vKel="+kel+"&vKec="+kec+"&vKab="+kab+"&vProp="+prop+"&vKdpos="+kdpos+"&vPassword="+password; 
    
     postUrl="User/MsUserSave.php";
      $.ajax({
           type: "POST",
           url: postUrl,
           data: dataString,
           cache: false,
           success: function(result){
            alert("finish!!"); 
            $("#register-modal").modal('hide');
           }
           
      });  
  }
  
  var  postUrl;
     $(document).ready(function(){  
     $("#loginUser").on('submit',(function(e) {       
        e.preventDefault();
        var dataString="userid="+$("#username").val()+"&password="+$("#login-pass").val();
        $.ajax({
          type: "POST",
          url: "User/cekloginUser.php" ,
          data: dataString,
          cache: false,
          success: function(result){
          window.location="index.php";                  
          }
      });
  }));
});

function confirm_password(){
var password         = document.registerForm.password.value;
var cpassword         = document.registerForm.confirpassword.value;
if(password==cpassword){
alert("confirmasi password benar");
}
else{
alert("confirmasi password salah");
}
}

function buattombolLogin()
{
   var dataString = "";  
   var postUrl="User/tomboluser.php";  
     $.ajax({
           type: "POST",
           url: postUrl,
           data: dataString,
           cache: false,
           success: function(result){
             $("#tombolLogin").html(result);

           }
      });
}

function login()                                          
  {
   var dataString = "";  
   var postUrl="admin/UserLogin.php";  
     $.ajax({
           type: "POST",
           url: postUrl,
           data: dataString,
           cache: false,
           success: function(result){
             $("#login").html(result);
           }
      });
  }

  function logout()                                          
  {
   var dataString = "";  
   var postUrl="admin/user/logoff.php";  
     $.ajax({
           type: "POST",
           url: postUrl,
           data: dataString,
           cache: false,
           success: function(result){
            window.location="index.php";
           }
      });
  }
    
 function cekLoginUser()
 {
  
  var dataString="userid="+$("#username").val()+"&password="+$("#login-pass").val();  
        var postUrl="User/cekloginUser.php";
              $.ajax({
                type: "POST",
                url: postUrl,
                data: dataString,
                cache: false,
                success: function(result){
                    if (result!=0)
                    {
                      $("#login-modal").modal('hide');
                      buattombolLogin();
                    }
                   if (result==0)
                    {                     
                      alert("Login Gagal !!!");
                    }
                
                }
      });
 } 

 function cekoutpaymentprocess()
 {
  var dataString="";  
  var postUrl="User/cekout.php";
    $('#lookmodal').modal('toggle');
    $('#lookmodal').modal('show');
    $(".modal-dialog").width(1350 );  
         $.ajax({
         type: "POST",
         url: postUrl,
         data: dataString,
         cache: false,
         success: function(result){  
            $("#loadmodal").html(result);                                       
      }
    });
 }

 function chartdone()
 {
   var dataString = "mejaid="+$("#mejaid  option:selected").val();  
   var postUrl="etalase/chartdone.php";  
     $.ajax({
           type: "POST",
           url: postUrl,
           data: dataString,
           cache: false,
           success: function(result){
            $("#lookmodal").modal('hide');
            BackuToShop();
          } 
      });
 }

 function cekoutprocess()
 {
   var dataString = "";  
   var postUrl="User/cekapakahsudahlogin.php";  
   /*  $.ajax({
           type: "POST",
           url: postUrl,
           data: dataString,
           cache: false,
           success: function(result){
            if (result=="Y")
            {*/
              cekApakahAdaBelanja();
          /*  }

            if (result!="Y")
            {            
            login();
            }

          } 
      });*/
 }

 function cekApakahAdaBelanja()
 {
   var dataString = "";  
   var postUrl="etalase/cekapakahsudahadapesanan.php";  
     $.ajax({
     type: "POST",
     url: postUrl,
     data: dataString,
     cache: false,
     success: function(result){
      console.log(result);
        if (result=="Y")
        {
          cekoutpaymentprocess();
        }
         if (result != "Y")
        {
            cekoutpaymentprocess();
          //alert("Keranjang Pensanan masih kosong !!!!");
        }
      }  
    });
 }

</script>  
  <div class="container"> 
  <div class="navbar navbar-default navbar-fixed-top">
  
    <div class="navbar-header">
   
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>

    <?php
    $i=0;
  $connect = new mysqli($hostname,$username, $password,  $database);
  $query = mysqli_query($connect,"SELECT id,typecode,typename FROM producttype",MYSQLI_USE_RESULT) or die("Gagal mengambil data");
  echo '<div class="col-lg-12">';
  while($row = mysqli_fetch_assoc($query)){ 
    echo '<div class="col-lg-2">';
    echo '<span>&nbsp;<button type="button" onClick="RecallEtalase('.$row["id"].');"class="btn btn-arrow btn-arrow-bottom btn-success btn-outline menu">'.$row["typename"].'</button></span>';
    echo '</div>';
    $i++;
  }   
      echo '<div class="col-lg-2">';
      echo '<span>&nbsp;<img src="img/logo.jpg" class="imglogo" href="#"></span>';    
      echo '</div>';
    ?>
    <div class="col-lg-2">
    <button type="button" onClick="TpKeranjang();" class="btn btn-arrow btn-arrow-bottom btn-success btn-outline menu"><i class="fa fa-shopping-cart"></i>Keranjang</button>
    </div>
    <div class="col-lg-2">
    <span id="tombolLogin"></span>
    </div>
  </div>
</div>   
    <div class="row">
       <span id="displayKeranjang"></span>
    </div> 
  	<div class="row">
       <span id="displayProduct"></span>
  	</div>
  </div>
<div id="hihh"></div>   
</head>

<div id="normalModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>          
        </div>
        <div class="modal-body">
          <div id="bodynormal"></div>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <div class="modal fade pull-right" id="lookmodal" data-backdrop="static"  
  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                 <button type="button" class="btn btn-white btn-xs btn-info btn-bold" data-dismiss="modal">&times;Close</button>
                       
                </div>
                  <div class="page-content">
                  <div id='loadmodal'></div> 
                  <input type='hidden' id='idlookup' value=0 namke='idlookup' >
                  </div>
            </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

   <div class="modal fade pull-right" id="NewWindows" data-backdrop="static"  data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog ">
              <div class="modal-content bodyBacgroundPOPUP">
                  <div class="page-content bodyBacgroundPOPUP">
                  <div id='loadmodalNew'></div> 
                  <input type='hidden' id='idlookup1' value=0 namke='idlookup' >
                  </div>
            </div><!-- /.modal-content -->
           </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
<div id="login"></div>
<body>
<style>
body {
    padding-top: 50px;
}
</style>
</body> 
</html>
