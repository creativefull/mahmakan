<?php
	include_once('../ToMysql.php');
	include('../class/myclass.php');
	$obj = new myclass;    
	echo '<div id="Message"></div>';
	echo '<div id="orderTbl"></div>';
?>

<script>
	$(function (){
		$("#informationApp").html("List");
		LoadTableOrder();
	});

	function LoadTableOrder() {
		var dataString='id='+0;
		$("#orderTbl").html('Loading <img src="../img/loading6.gif" />');
		$("#orderTbl").show();
		$.ajax({
			type: "POST",
			url: "../admin/orderTable.php",
			data: dataString,
			cache: false,
			success: function(result){
				hidemessege();
				$("#orderTbl").html(result);
			}
		});
	}
</script>
