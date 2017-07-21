<?php if (!isset($_SESSION)) {
        session_start();
    } 
    
  include_once('../ToMysql.php');

?>
  <script type="text/javascript">
    $(document).ready(function(){
     tampiletalase(0);
     callslite(0); 
     TpKeranjang();   
   });
   
   function RecallEtalase($typeid)
   {
    TpKeranjang(); 
    tampiletalase($typeid);
    callslite($typeid);  
   }

   function tampiletalase(typeid)
   {
    var dataString='id='+0+"&typeid="+typeid;       
         $("#displayProduct").html
         ('Loading <img src="../img/loading6.gif" />');
         $("#displayProduct").show();
         $.ajax({
         type: "POST",
         url: "displayproduct.php",
         data: dataString,
         cache: false,
         success: function(result){  
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
    			$('#'+$label).css('margin-top','100px').css('transition','all 0.5s ease-in').css('-webkit-transition','all 0.5s ease-in').css('-moz-transition','all 0.5s ease-in').css('-o-transition','all 0.5s ease-in').css('-ms-transition','all 0.5s ease-in');
    		});
    	}
  
   function InputNomor(brs)
   {
    var idnomor="#idnomordiv"+brs;
    var seleCmb="#cmbpaytypeid"+brs;
    var nomorid="nomorid"+brs;
    var strseleCmb=$(seleCmb+" option:selected").text();
    var potition=strseleCmb.indexOf("#");
    var valselectnomor=strseleCmb.substr(potition+1,1);
    var inputnomorEnable="<input type='text' value='' id="+nomorid+" />";
    var inputnomorEnablefalse="<input type='text' value='' id="+nomorid+" disabled />";

    if (valselectnomor=="1")
    {
      $("#idnomordiv"+brs).html(inputnomorEnable);
      $("#idnomordiv"+brs).show();  
    }

     if (valselectnomor!="1")
    {
      $("#idnomordiv"+brs).html(inputnomorEnablefalse);
      $("#idnomordiv"+brs).show();         
    }
    }

    function functionhitung(brs)
    {
      var iddivinputpay;
      var total=Number($("#totalyghrs").val());
      var nputpayid;
      var i=0;
      var JmlByrsdh=0;
      var n=0;
      for (i = 0; i < brs; i++) { 
        n++;
        iddivinputpay="#iddivinputpay"+n;
        nputpayid="#nputpayid"+n;
        total=total-Number($(nputpayid).val());        
        JmlByrsdh=JmlByrsdh+Number($(nputpayid).val());
      }    
      $("#JmlByr").val(JmlByrsdh);
      return total;

    }



   function inputpay(brs)
    {
      var iddivinputpay="#iddivinputpay"+brs;
      var nputpayid="nputpayid"+brs;

      var inputpayEnable="<input type='text' oninput='functionhitung("+brs+");' value=0 id="+nputpayid+" />";

      $(iddivinputpay).html(inputpayEnable);
      $(iddivinputpay).show();

    }


   function inputsaldo(brs,valuesaldo)
   {
    var id="nilaisaldo"+brs;
    var saldodiv="#saldodiv"+brs;
    var inputSaldoEnable="<input type='text'  value="+valuesaldo+" id="+id+" />";
    $(saldodiv).html(inputSaldoEnable);
    $(saldodiv).show();
   }

   function Addrowpayment()
     {
      var paytypeid=0;
      var brs=$("#totrow").val();
      var payTypeName="";
      var idrow="idrowdiv";
      var stringpay="";
      var saldodiv="";
      var postUrl="paymenttype.php";
      brs++;
      var iddivinputpay;
      var dataString="id=0"+"&paytypeid="+paytypeid+"&payTypeName="+payTypeName+"&brs="+brs;
      $.ajax({
        type: "POST",
        url: postUrl,
        data: dataString,
        cache: false,                                       
        success: function(result){
            stringpay=result;            
            idrow="idrowdiv"+brs;
            idnomor="idnomordiv"+brs;
            saldodiv="saldodiv"+brs;
            iddivinputpay="iddivinputpay"+brs;
            v='<tr class="item-row" >';
            v=v+ '<td style="display:none;"></td>';
            v=v+ '<td><div id='+idrow+'></div></td>';
            v=v+ '<td><div id='+idnomor+'></div></td>';
            v=v+ '<td style="display:none;"><div id='+saldodiv+'></div></td>';
            v=v+ '<td><div id='+iddivinputpay+'></div></td>';            
            v=v+"</tr>";
            $(".item-row:last").after(v);
            $("#totrow").val(brs);
            $('#'+idrow).html(stringpay);
            $('#'+idrow).show();
            InputNomor(brs);
            inputpay(brs);
            inputsaldo(brs,functionhitung(brs));
        }
      });
     }
 

    
    function callslite(typeid)
      {
        var dataString="start="+0+"&typeid="+typeid;  
        var postUrl="../etalase/runScrollProduct.php";
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
        var postUrl="keranjangPOS.php";
              $.ajax({
                type: "POST",
                url: postUrl,
                data: dataString,
                cache: false,
                success: function(result){
                //$("#displayProduct").hide();
                $("#displayKeranjang").html(result); 
                $("#displayKeranjang").show();   
                }
            });
           
      }

    function BackuToShop()
    {
      $("#displayProduct").show();   
    }

    function Chart(Productid,UnitId,act,GambarProductId,VaraMeterFormulas)
      {
       var dataString='Productid='+Productid+"&act="+act+"&UnitId="+UnitId;
       var dd;
        $("#displayProduct").hide();
        $("#hihh").html
         ('Proces........! <img src="../img/loading6.gif" />');
         $("#hihh").show();

          postUrl="cartpost.php";          
          $.ajax({
            type: "POST",
            url: postUrl,
            data: dataString,
            cache: false,
            success: function(result){  
              $("#hihh").hide();
              TpKeranjang();
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


 function paymentdetailForm()
 {
   var dataString = "totalpesanan="+$("#totalpesanan").val();  
    $('#lookmodal').modal('toggle');
    $('#lookmodal').modal('show');
    $(".modal-dialog").width(1200 ); 
    var postUrl="paymentdetail.php";  
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
   var dataString = "";  
   var postUrl="payment.php";  
     $.ajax({
           type: "POST",
           url: postUrl,
           data: dataString,
           cache: false,
           success: function(result){
            BayarSave(result);
            BayarDetail(result);
            BackuToShop();
            TpKeranjang();
            
          } 
      });
 }

function BayarDetail(charthdid)
{
  dataString = "charthdid="+charthdid+"&jumlahbyr="+$("#JmlByr").val();
  $.ajax({
           type: "POST",
           url: "paymenttotalsave.php",
           data: dataString,
           cache: false,
           success: function(result){
             
          } 
  });
}


 function BayarSave(charthdid)
 {
  
  var dataString = "";  
  var postUrl="paymentdetailsave.php"; 
  var paymenttypeid=0;
  var nominal=0;
  var nomorkartu="";
  var nputpayid="nputpayid"+brs;
  var nomorid="nomorid";
  var idnomor="#idnomordiv"+brs;
  var seleCmb="#cmbpaytypeid"+brs;
  var nomorid="nomorid"+brs;

  var strseleCmb=$(seleCmb+" option:selected").text();
  var potition=strseleCmb.indexOf("#");
  var valselectnomor=strseleCmb.substr(potition+1,1);
  
  var brs=$("#totrow").val();
  var n=0;

  for (i = 0; i < brs; i++) { 
        n++;
        seleCmb="#cmbpaytypeid"+n;
        paymenttypeid=$(seleCmb+" option:selected").val();
        dataString = "charthdid="+charthdid+"&paymenttypeid="+paymenttypeid
        +"&nominal="+$("#nputpayid"+n).val()
        +"&nomorkartu="+$("#nomorid"+n).val();
        $.ajax({
           type: "POST",
           url: postUrl,
           data: dataString,
           cache: false,
           success: function(result){
              BackuToShop();

              $("#lookmodal").modal('hide');         
          } 
      });

  }    


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
        }
      }  
    });
 }


</script>  
  
<div class="col-md-12">
<div class="col-md-6">
   <div class="row">
    <div class="panel panel-danger">
      <div class="panel-heading">
      <?php
  $connect = new mysqli($hostname,$username, $password,  $database);
  $query = mysqli_query($connect,"SELECT id,typecode,typename FROM producttype",MYSQLI_USE_RESULT) or die("Gagal mengambil data");
  while($row = mysqli_fetch_assoc($query)){ 
    echo '<span>&nbsp;';
    echo '<button type="button" onClick="RecallEtalase('.$row["id"].');"class="btn btn-info menu">'.$row["typename"].'</button>';
    echo "</span>";
  }   
    ?>
      </div>
      <div class="panel-body">
       <span id="displayProduct"></span>
      </div>
   </div>
</div>
</div>
<div class="col-md-1">
</div>
<div class="col-md-5">
  <div class="row">
  <div class="panel panelputih">
  <div id="tombolheading"></div>
  <div class="panel-heading">
  
  </div>
      <div class="panel-body table-responsive">
      <input type="hidden" id="totalpesanan" value=0></div>
      <div class="panel panelputih">
      <div class="col-md-12">
       <span id="displayKeranjang"></span>
       </div>
       </div>
       </div>
  </div>
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
    padding-top: 30px;
}
</style>
</body> 
</html>
