<?php  
    if (!isset($_SESSION)) {
        session_start();
  } 
    
   include_once('../ToMysql.php');
   include('../class/myclass.php');
   $obj = new myclass;

$tanggalmulai="";
$active="";
$Class=" Style='Width:220px'";
echo $obj->inputtext("Tanggal Penjualan   ","tanggalmulai","Tanggal dimulai ",$tanggalmulai,$active,$Class," data-date-format='dd-mm-yyyy' class='form-control date-picker'") ;

echo '<a href="#" onClick="loadreporttanggal();" class="btn btn-default menu">Proses</a>';

?>

<script type="text/javascript">
	 $('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				
 
 function loadreporttanggal()
 {
 	dataString = "tanggal="+$("#tanggalmulai").val();
 	$('#lookmodal').modal('toggle');
    $('#lookmodal').modal('show');
    $(".modal-dialog").width(1200 ); 
  $.ajax({
           type: "POST",
           url: "laporanpenjualan.php",
           data: dataString,
           cache: false,
           success: function(result){
             $("#loadmodal").html(result); 
          } 
      });
 } 

				
</script>