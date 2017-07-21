<?php
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;    
echo '<div id="pagediv"></div>';
echo '<div id="ProducttblDiv"></div>';
?>

 <script type="text/javascript">
    $(document).ready(function() {
        $("#informationApp").html("List");
        LoadPage();
        loadRefreshTableProductTable(0,0);
   });

function LoadPage() {
        var dataString='id='+0;       
         $("#pagediv").html
         ('Loading <img src="../img/loading6.gif" />');
         $("#pagediv").show();
         $.ajax({
         type: "POST",
         url: "../admin/page.php",
         data: dataString,
         cache: false,
         success: function(result){  
            hidemessege();                         
            $("#pagediv").html(result);                                          
         }
         });
       }

function RefreshProd()
{
   loadRefreshTableProductTable(0,0);
}

function loadRefreshTableProductTable(pageId,Vid)
{
    if (Vid==undefined)
    {
      Vid=0;
    }
     LoadTableproduct(pageId,$("#Page option:selected").val(),Vid);
  }

 function LoadTableproduct(pageId,recordsPerPage,Vid) {
        var dataString='id='+0+"&recordsPerPage="+recordsPerPage+"&pageId="+pageId;       
         $("#ProducttblDiv").html
         ('Loading <img src="../img/loading6.gif" />');
         $("#ProducttblDiv").show();
         $.ajax({
         type: "POST",
         url: "../admin/producttable.php",
         data: dataString,
         cache: false,
         success: function(result){  
          	hidemessege();                         
            $("#ProducttblDiv").html(result);                                          
         }
         });
       }

  

  function saveproduct(){
  		var dataString='id='+$("#idproduct").val()+"&productcode="+$("#productcode").val()+"&productname="+$("#productname").val()+"&price="+$("#price").val()+"&producttypeid="+$("#producttypeid option:selected").val()+"&remaks="+$("#remaks").val()+"&stock="+$('#stock').val();
  		if ($("#productcode").val()=="")
  		{
  		$("#Message").html("Code Product tidak boleh kosong !!!"+"<a href='#' class='btn btn-warning menu' onClick='hidemessege();'>Clear</a>");
  		}       
  		if ($("#productcode").val()!="")
  		{
         $.ajax({
         type: "POST",
         url: "../admin/productsave.php",
         data: dataString,
         cache: false,
         success: function(result){                           
            $("#Message").html(result);                                          
         }
      });	
 	}
  }

  

  function detailproduct(id,var1)
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
  		  		 
         $("#ProducttblDiv").html('Loading <img src="../img/loading6.gif" />');
         $("#ProducttblDiv").show();
         $.ajax({
         type: "POST",
         url: "../admin/productdetail.php",
         data: dataString,
         cache: false,
         success: function(result){ 
         	$("#informationApp").html(lbl);                          
          $("#ProducttblDiv").html(result);                                           
         }
         });
  }

  function UploadPictureProduct(brs,id)
  {
   $('#lookmodal').modal('toggle');
   $('#lookmodal').modal('show');
   $(".modal-dialog").width(300 );     
   var dataString="id="+id+"&brs="+brs;  
   var postUrl="UploadResizeOthersProduct.php";     
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
 </script>