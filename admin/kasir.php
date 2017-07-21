<?php
	include_once('../ToMysql.php');
	include('../class/myclass.php');
	$obj = new myclass;    
	echo '<div id="Message"></div>';
	echo '<div id="Kasirtbl"></div>';
?>

<script type = "text/javascript">
	$(function (){
		$("#informationApp").html("List");
		LoadTableKasir();
	});

	function LoadTableKasir() {
		var dataString='id='+0;
		$("#Kasirtbl").html('Loading <img src="../img/loading6.gif" />');
		$("#Kasirtbl").show();
		$.ajax({
			type: "POST",
			url: "../admin/kasirtable.php",
			data: dataString,
			cache: false,
			success: function(result){
				hidemessege();
				$("#Kasirtbl").html(result);
			}
		});
	}

	function simpanKasir () {
		var name = $('#name').val();
		var username = $('#username').val();
		var passsword = $('#passsword').val();
		var email = $('#email').val();
		var dataString='id='+$("#idkasir").val()+"&name="+$("#name").val()+"&username="+$("#username").val()+"&password="+$('#password').val()+"&email="+email;
		if (name == "" || username == "" || password == "" || email == "") {
			$("#Message").html("data tidak boleh kosong !!!"+"<a href='#' class='btn btn-warning menu' onClick='hidemessege();'>Clear</a>");
		} else {
			$.ajax({
				type: "POST",
				url: "../admin/simpanKasir.php",
				data: dataString,
				cache: false,
				success: function(result){
					$("#Message").html(result);
				}
			});
		}
	}

	function deleteKasir (id) {
		if (confirm("apakah anda yakin ?")) {
			$.ajax({
				url : '../admin/deleteKasir.php',
				type : 'POST',
				dataType : 'json',
				data : { id : id},
				success : function (msg) {
					if (msg.status == 200 ) {
						LoadTableKasir();
					} else {
						alert('data gagal di hapus ~~~');
					}
				}
			});
		}
	}

	function tambahKasir(id, var1){
		var dataString='id='+id; 
		if (var1==1) {
			lbl="Tambah";
		}

		if (var1==2) {
			lbl="Delete";
		}

		if (var1==3){
			lbl="View";
		}

		$("#Kasirtbl").html('Loading <img src="../img/loading6.gif" />');
		$("#Kasirtbl").show();
		$.ajax({
			type: "POST",
			url: "../admin/tambahKasir.php",
			data: dataString,
			cache: false,
			success: function(result){ 
				$("#informationApp").html(lbl);
				$("#Kasirtbl").html(result);
			}
		});
	}

</script>