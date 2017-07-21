<?php  if (!isset($_SESSION)) {
        session_start();
    }
include_once('../ToMysql.php');
include('../class/myclass.php');
$obj = new myclass;      
?>
<script>
function resetActive(event, percent, step) {
        $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
        $(".progress-completed").text(percent + "%");

        $("div").each(function () {
            if ($(this).hasClass("activestep")) {
                $(this).removeClass("activestep");
            }
        });

        if (event.target.className == "col-md-2") {
            $(event.target).addClass("activestep");
        }
        else {
            $(event.target.parentNode).addClass("activestep");
        }

        hideSteps();
        showCurrentStepInfo(step);
    }

    function hideSteps() {
        $("div").each(function () {
            if ($(this).hasClass("activeStepInfo")) {
                $(this).removeClass("activeStepInfo");
                $(this).addClass("hiddenStepInfo");
            }
        });
    }

    function showCurrentStepInfo(step) {        
        var id = "#" + step;
        $(id).addClass("activeStepInfo");
    }

</script>

<div class="container" >
    <div class="row">
        <div class="progress" id="progress1">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            </div>
            <span class="progress-type">Overall Progress</span>
            <span class="progress-completed">0%</span>
        </div>
    </div>
    <div class="row">
        <div class="row step">
            <div style="padding-top: 4px;" id="div1" class="col-md-2 activestep" onclick="javascript: resetActive(event, 0, 'step-1');">
                <p>Intruksi tahap-tahap proses belanja</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 10, 'step-2');">
                <span class="fa fa-pencil"></span>
                <p>Kelengkapan Data pribadi customer </p>
            </div>
            <?php
            //<div class="col-md-2" onclick="javascript: resetActive(event, 20, 'step-3');">
              //  <span class="fa fa-qrcode"></span>
              //  <p>Shipping Code</p>
           // </div>

           
           // <div id="last" class="col-md-2" onclick="javascript: resetActive(event, 70, 'step-6');">
            //    <span class="fa fa-plus-square-o"></span>
           //     <p>Services Tambahan</p>
          //  </div>
        
        
       // <div id="last" class="col-md-2" onclick="javascript: resetActive(event, 80, 'step-7');">
         //       <span class="fa fa-cubes"></span>
           //     <p>Create Shipment</p>
            //</div>
     ?>

<div id="last" class="col-md-2" onclick="javascript: resetActive(event, 100, 'step-9');">
                <span class="fa fa-star"></span>
                <p>Done</p>
            </div>
        </div>
    </div>
    <div class="row setup-content step activeStepInfo" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h3 class="underline">Instruksi </h3>
                Unutuk kelancaran proses pengiriman 
                1. Mohon isi form sesuai urutsan proses
                2. Cek kembali belanja anda apakah sudah sesuai dengan yg anda harapkan <br>
                <div style="margin-top:10px;"></div>
            </div>
        </div>
    </div>
    
    <div class="row setup-content step hiddenStepInfo" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h3 class="underline">Form Registrasi customer</h3>
                <span style="color: #FF0000;"></span><br>
                
            </div>
        </div>
    </div>
<?php   
echo ' <div class="row setup-content step hiddenStepInfo" id="step-9">';    
echo ' <div class="col-xs-6">';       
$connect = new mysqli($hostname,$username, $password,  $database);
$query = mysqli_query($connect,"SELECT `id`,`kodemeja` FROM `meja`",MYSQLI_USE_RESULT) or die("Gagal mengambil data");
echo 'Meja : ';
            echo '<select class="form-control" id="mejaid" name="mejaid">';
            while($row = mysqli_fetch_assoc($query)){ 
               echo '<option value='.$row["id"].'>'.$row["kodemeja"].'</option>';
            }
            echo '</select>';
        ?>
        </div>
            <div class="col-md-6 well text-center">
                <a href="#" onClick="chartdone();" class="btn btn-success menu pull-right">
                            Done (Proses Selesai) <span class="glyphicon glyphicon-play"></span>
                        </a> 
           
            </div>
        </div>
    </div>
