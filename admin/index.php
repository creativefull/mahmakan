<?php if (!isset($_SESSION)) {
        session_start();
    } 
    include "../class/MenuClass.php";    
    $objmenu = new MenuClass;
    $Db='ToMysql.php';


if ( !isset($_SESSION['idUs'])) {
     header('location:user/login.php');
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <title>Restoran | Admin </title>
  
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/admin.css" rel="stylesheet">
    <link href="../assets/DatePicker/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/Font-Awesome-4.3.0/css/font-awesome.min.css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.min.js"></script>
    <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js" type="text/javascript"></script>
    <script src="../assets/DatePicker/bootstrap-datepicker.min.js" type="text/javascript"></script>   
 </head>
<body>
 
  <nav class="navbar navbar-inverse top-bar navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> <span class="menu-icon" id="menu-icon"><i class="fa fa-times" 
        aria-hidden="true" id="chang-menu-icon"></i></span>
        <a class="navbar-brand" href="#" ><img src="../img/logo.png" width="90%" class="imgboxlogo"> </a>
      </div>
      <div class="collapse navbar-collapse navbar-right" id="myNavbar">        
        <ul class="nav navbar-nav">
          <li class=""><a href="#"><i class="fa fa-volume-up"></i></a> </li>
          <li class=""><a href="#"><i class="fa fa-envelope"></i> </a> </li>
          <li class=""><a href="#"><i class="fa fa-bell"></i> </a> </li>
          <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sumit          
           <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
              <li> <a href="#"><i class="fa fa-cog"></i> Setting</a> </li>
              <li> <a href="logout.php"><i  class="fa fa-power-off"></i> Logout</a> </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--    top nav end===========-->
  <div class="wrapper" id="wrapper">
    <div class="left-container" id="left-container">
      <!-- begin SIDE NAV USER PANEL -->
      <div class="left-sidebar" id="show-nav">
        <ul id="side" class="side-nav">
          <li class="panel">
            <a id="panel1" href="javascript:;" data-toggle="collapse" data-target="#Dashboard"> <i class="fa fa-dashboard fa-2x"></i> Dashboard
            <i class="fa fa-chevron-left pull-right" id="arow1"></i> </a>
            <ul class="collapse nav" id="Dashboard">            
            </ul>
          </li>
          <?php
            if ($_SESSION['role'] != 'kasir') {
              ?>
                <li class="panel">
                  <a id="panel2" href="javascript:;" data-toggle="collapse" data-target="#charts"> <i class="fa fa-bar-chart-o"></i> Master File
                    <i class="fa fa-chevron-left pull-right" id="arow2"></i> </a>
                  <ul class="collapse nav" id="charts">
                    <li> <a href="#" onClick="ExeMain('../admin/producttypehome.php','Product Type',0,'');"><i class="fa fa-angle-double-right"></i>Product Type</a> </li>
                    <li> <a href="#" onClick="ExeMain('../admin/producthome.php','Product File',0,'');"><i class="fa fa-angle-double-right"></i>Product</a> </li>
                    <li>
                      <a href="#" onClick="ExeMain('../admin/kasir.php','Daftar Kasir',0,'');"><i class="fa fa-angle-double-right"></i>
                        Kasir
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="panel">         
                  <a id="panel3" href="javascript:;" data-toggle="collapse" data-target="#calendar"> <i class="fa fa-calendar"></i> Transaksi
                    <span class="label label-danger"></span> <i class="fa fa-chevron-left pull-right" id="arow3"></i> </a>
                  <ul class="collapse nav" id="calendar">         
                    <li> <a href="#"  onClick="ExeMain('../admin/pointofsales.php','Point of Sale',0,'');">><i class="fa fa-angle-double-right"></i> Point Of Sales</a> </li>
                    <li> <a href="#"><i class="fa fa-angle-double-right"></i> Pelunasan Customer</a> </li>
                  </ul>           
                </li>

                <li class="panel">
                  <a id="panel7" href="javascript:;" data-toggle="collapse" data-target="#penjualanrpt"> <i class="fa fa-calendar"></i> Laporan
                    <span class="label label-danger"></span> <i class="fa fa-chevron-left pull-right" id="arow3"></i> </a>
                  <ul class="collapse nav" id="penjualanrpt">
                    <li> <a href="#" onClick="ExeMain('../admin/fitertanggal.php','Laporan Penjualan Per tanggal',0,'');"><i class="fa fa-angle-double-right"  ></i> Laporan Penjualan</a> </li>
                  </ul>           
                </li>
               
                <li class="panel">
                  <a id="panel6" href="javascript:;" data-toggle="collapse" data-target="#inbox"> <i class="fa fa-inbox"></i> Maintenance
                    <span class="label label-primary"></span> <i class="fa fa fa-chevron-left pull-right" id="arow6"></i> </a>
                  <ul class="collapse nav" id="inbox">
                    <li> <a href="#"><i class="fa fa-angle-double-right"></i> User file</a> </li>
                    <li> <a href="#"><i class="fa fa-angle-double-right"></i> Company </a> </li>
                  </ul>
                </li>
              <?php
            } else {
              ?>
              <li class="panel">
                <a href="#" onClick="ExeMain('../admin/order.php','Order',0,'');" id="panel1" > 
                  <i class="fa fa-calendar fa-2x"></i> 
                  Order
                  <i class="fa fa-chevron-left pull-right" id="arow1"></i>
                  </a>
              </li>
              <?php
            }
          ?>
        </ul>
      </div>
      <!-- END SIDE NAV USER PANEL -->
    </div>
    <div class="right-container" id="right-container">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
            <ul class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="#"> Home</a></li>
						<li class="active"><span id="aplicationmdl"></span></li>
					</ul>
            </div>
            <div class="col-md-8">
            <ul class="list-inline pull-right mini-stat">
							<li>
								<h5>LIKES <span class="stat-value color-blue"><i class="fa fa-plus-circle"></i></span></h5>
								
							</li>
							<li>
								<h5>SUBSCRIBERS <span class="stat-value color-green"><i class="fa fa-plus-circle"></i></span></h5>
								
							</li>
							<li>
								<h5>CUSTOMERS <span class="stat-value color-orang"><i class="fa fa-plus-circle"></i></span></h5>
								
							</li>
						</ul>
            </div>
            </div>


            <div class="row">
            <div class="col-md-12">
              <div class="main-header panelputih">
  					     <h2><span id="labelAplication"></span></h2>
  					     <span id="informationApp" ></span>
  			   	   </div>
              </div>
            </div>
                <div class="col-md-12">
                <div class="row padding-top">
                <div class="panel panelputih table-responsive">
                  <div class="panel-heading">
                  <div id="headformid"></div>
                  </div>
                    <div class="panel-body">                 
                      <div id="MainPage"></div>                 
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>

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
   
  <script type="text/javascript">
    $(document).ready(function() {
      $("#panel1").click(function() {
        $("#arow1").toggleClass("fa-chevron-left");
        $("#arow1").toggleClass("fa-chevron-down");
      });
        
      $("#panel2").click(function() {
        $("#arow2").toggleClass("fa-chevron-left");
        $("#arow2").toggleClass("fa-chevron-down");
      });
        
      $("#panel3").click(function() {
        $("#arow3").toggleClass("fa-chevron-left");
        $("#arow3").toggleClass("fa-chevron-down");
      });
        
      $("#panel4").click(function() {
        $("#arow4").toggleClass("fa-chevron-left");
          $("#arow4").toggleClass("fa-chevron-down");
      });
        
      $("#panel5").click(function() {
        $("#arow5").toggleClass("fa-chevron-left");
        $("#arow5").toggleClass("fa-chevron-down");
      });
        
      $("#panel6").click(function() {
        $("#arow6").toggleClass("fa-chevron-left");
        $("#arow6").toggleClass("fa-chevron-down");
      });
        
      $("#panel7").click(function() {
        $("#arow7").toggleClass("fa-chevron-left");
        $("#arow7").toggleClass("fa-chevron-down");
      });
        
      $("#panel8").click(function() {
        $("#arow8").toggleClass("fa-chevron-left");
        $("#arow8").toggleClass("fa-chevron-down");
      });
        
      $("#panel9").click(function() {
        $("#arow9").toggleClass("fa-chevron-left");
        $("#arow9").toggleClass("fa-chevron-down");
      });
        
      $("#panel10").click(function() {
        $("#arow10").toggleClass("fa-chevron-left");
        $("#arow10").toggleClass("fa-chevron-down");
      });
        
      $("#panel11").click(function() {
        $("#arow11").toggleClass("fa-chevron-left");
        $("#arow11").toggleClass("fa-chevron-down");
      });
        
      $("#menu-icon").click(function() {
        $("#chang-menu-icon").toggleClass("fa-bars");
        $("#chang-menu-icon").toggleClass("fa-times");
        $("#show-nav").toggleClass("hide-sidebar");
        $("#show-nav").toggleClass("left-sidebar");         
        $("#left-container").toggleClass("less-width");
        $("#right-container").toggleClass("full-width");
      });
                    
    });

    function logooff()
  {
   var dataString = "";  
   var postUrl="user/logoff.php";  
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
    
    function ExeMain(nmfile,JdlMdl,id,storeprocedure) {
         var dataString='id='+id+'&nmfile='+nmfile+'&storeprocedure='+storeprocedure+'&Jdl='+JdlMdl;       
         $("#MainPage").html
         ('Loading <img src="../img/loading6.gif" />');
         $("#MainPage").show();
         $.ajax({
         type: "POST",
         url: nmfile,
         data: dataString,
         cache: false,
         success: function(result){      
            $("#labelAplication").html(JdlMdl);         
            $("#MainPage").html(result); 
            $("#aplicationmdl").html(JdlMdl);                                          
         }
         });
       }
       
   function tpInformation(lblcaption)
   {
    $("#informationApp").html(lblcaption);
   }
    
   function MessageAction(message)
  {
    $("#Message").html(message+"<a href='#' class='btn btn-warning menu' onClick='hidemessege();'>Clear</a>");
  }

  function hidemessege()
  {
    $("#Message").html("");
  }
  </script>
       
    
</body>

</html>