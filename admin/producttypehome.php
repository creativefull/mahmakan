<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;    
echo '<div id="ProTypetbl"></div>';
?>

 <script type="text/javascript">
    $(document).ready(function() {
        $("#informationApp").html("List");
        LoadTableproduxtType();
   });


 function LoadTableproduxtType() {
        var dataString='id='+0;       
         $("#ProTypetbl").html
         ('Loading <img src="../img/loading6.gif" />');
         $("#ProTypetbl").show();
         $.ajax({
         type: "POST",
         url: "../admin/producttypetable.php",
         data: dataString,
         cache: false,
         success: function(result){  
         	hidemessege();                         
            $("#ProTypetbl").html(result);                                          
         }
         });
       }

  

  function saveproducttype()
  {
  		var dataString='id='+$("#idtype").val()+"&typecode="+$("#typecode").val()+"&typename="+$("#typename").val();
  		if ($("#typecode").val()=="")
  		{
  		$("#Message").html("Code Type tidak boleh kosong !!!"+"<a href='#' class='btn btn-warning menu' onClick='hidemessege();'>Clear</a>");
  		}       
  		if ($("#typecode").val()!="")
  		{
         $.ajax({
         type: "POST",
         url: "../admin/producttypesave.php",
         data: dataString,
         cache: false,
         success: function(result){                           
            $("#Message").html(result);                                          
         }
      });	
 	}
  }

  

  function detailproductType(id,var1)
  {
  	var dataString='id='+id; 
  		 if (var1==1)
  		 {
  		 	lbl="Tambah";
  		 }
  		 if (var1==2)
  		 {
  		 	lbl="Delete";
  		 }

  		 if (var1==3)
  		 {
  		 	lbl="View";
  		 }
  		  		 
         $("#ProTypetbl").html('Loading <img src="../img/loading6.gif" />');
         $("#ProTypetbl").show();
         $.ajax({
         type: "POST",
         url: "../admin/producttypesetail.php",
         data: dataString,
         cache: false,
         success: function(result){ 
         	$("#informationApp").html(lbl);                          
            $("#ProTypetbl").html(result);                                           
         }
         });
  }
 </script>