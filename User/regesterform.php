<?php
?>

<script>


  $().ready(function() {
    // validate the comment form when it is submitted
    $("#registerFormUser").validate();
    // validate signup form on keyup and submit
    $("#registerFormUser").validate({
      rules: {
        userrname: "required",
        useraddress: "required",
        city: "required",
        phone: "required",
        hp: "required",
        jalan: "required",
        nomor: "required",
        kelurahan: "required",
        kecamatan: "required",
        kabupaten: "required",
        propinsi: "required",
        kodepos: "required",
        password: {
          required: true,
          minlength: 5
        },
        confirpassword: {
          required: true,
          minlength: 5,
          equalTo: "#password"
        },
        email: {
          required: true,
          email: true
        },
        },
      messages: {
        userrname: "Please enter your name",
        useraddress: "Please enter your address",
        city: "Please enter your city",
        phone: "Please enter your phone number",
        hp: "Please enter your handphone number",
        jalan: "Please enter your home street",
        nomor: "Please enter your home number",
        kelurahan: "Please enter your kelurahan",
        kecamatan: "Please enter your kecamatan",
        kabupaten: "Please enter your kabupaten",
        propinsi: "Please enter your propinsi",
        kodepos: "Please enter your post code",
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        confirpassword: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long",
          equalTo: "Please enter the same password as above"
        },
        email: "Please enter a valid email address",
      }
    });
  });

function validasiForm(){
        var namaValid    = /^[a-zA-Z0-9\_\-]{6,100}$/;
        var emailValid   = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var nama         = registerForm.userrname.value;
        var alamat       = registerForm.useraddress.value;
        var kota         = registerForm.city.value;
        var telepon      = registerForm.phone.value;
        var hp           = registerForm.hp.value;
        var jalan        = registerForm.jalan.value;
        var blok         = registerForm.blok.value;
        var nomor         = registerForm.nomor.value;
        var rt         = registerForm.rt.value;
        var rw         = registerForm.rw.value;
        var kel         = registerForm.kelurahan.value;
        var kec         = registerForm.kecamatan.value;
        var kab         = registerForm.kabupaten.value;
        var prop         = registerForm.propinsi.value;
        var kdpos         = registerForm.kodepos.value;
        var email        = registerForm.email.value;
        var password         = registerForm.password.value;
        var cpassword         = registerForm.confirpassword.value;
        var pesan ="";
         
        if (nama == "") {
            pesan = "-Nama tidak boleh kosong\n";
            registerForm.userrname.focus();
        }
         
        if (nama != "" && !nama.match(namaValid)) {
            pesan += "-nama tidak valid\n";
            registerForm.userrname.focus();
        }
         
        if (alamat == "") {
            pesan += "-alamat tidak boleh kosong\n";
            registerForm.useraddress.focus();
        }
        
        if (alamat != ""&& !alamat.match(namaValid)) {
            pesan += "-alamat tidak valid\n";
            registerForm.useraddress.focus();
        }
        
        if (kota == "") {
            pesan = "-kota  tidak boleh kosong\n";
            registerForm.city.focus();
        }
         
        if (kota != "" && !kota.match(namaValid)) {
            pesan += "-kota tidak valid\n";
            registerForm.city.focus();
        }
        
        if (telepon == "") {
            pesan = "-telepon  tidak boleh kosong\n";
            registerForm.phone.focus();
        }
         
        if (telepon != "" && !telepon.match(namaValid)) {
            pesan += "-telepon tidak valid\n";
            registerForm.phone.focus();
        }
        
         if (hp == "") {
            pesan = "-Handphone  tidak boleh kosong\n";
            registerForm.hp.focus();
        }
         
        if (hp != "" && !hp.match(namaValid)) {
            pesan += "-Handphone tidak valid\n";
            registerForm.hp.focus();
        }
        
        if (jalan == "") {
            pesan = "-Jalan  tidak boleh kosong\n";
            registerForm.jalan.focus();
        }
         
        if (jalan != "" && !jalan.match(namaValid)) {
            pesan += "-Jalan tidak valid\n";
            registerForm.jalan.focus();
        }
        
        if (kel == "") {
            pesan = "-Kelurahan  tidak boleh kosong\n";
            registerForm.kelurahan.focus();
        }
         
        if (kel != "" && !kel.match(namaValid)) {
            pesan += "-kelurahan tidak valid\n";
            registerForm.kelurahan.focus();
        }
        
        if (kec == "") {
            pesan = "-Kecamatan  tidak boleh kosong\n";
            registerForm.kecamatan.focus();
        }
         
        if (kec != "" && !kec.match(namaValid)) {
            pesan += "-kecamatan tidak valid\n";
            registerForm.kecamatan.focus();
        }
        
        if (kab== "") {
            pesan = "-kabupaten  tidak boleh kosong\n";
            registerForm.kabupaten.focus();
        }
         
        if (kab != "" && !kab.match(namaValid)) {
            pesan += "-Kabupaten tidak valid\n";
            registerForm.kabupaten.focus();
        }
        
        if (prop== "") {
            pesan = "-Propinsi  tidak boleh kosong\n";
            registerForm.propinsi.focus();
        }
         
        if (prop != "" && !prop.match(namaValid)) {
            pesan += "-Propinsi tidak valid\n";
            registerForm.propinsi.focus();
        }
        
        if (kdpos== "") {
            pesan = "-kode pos  tidak boleh kosong\n";
            registerForm.kodepos.focus();
        }
         
        if (kdpos != "" && !kdpos.match(namaValid)) {
            pesan += "-Kode pos tidak valid\n";
            registerForm.kodepos.focus();
        }
        
         
        if (email == "") {
            pesan += "-email tidak boleh kosong\n";
            registerForm.email.focus();
        }
         
        if (email !="" && !email.match(emailValid)) {
            pesan += "-alamat email tidak valid\n";
            registerForm.email.focus();
        }
        
        if (password== "") {
            pesan = "- password  tidak boleh kosong\n";
            registerForm.password.focus();
        }
         
        if (password != "" && !password.match(namaValid)) {
            pesan += "-Password harus lebih bervariasi\n";
            registerForm.password.focus();
        }
        
         if (cpassword== "") {
            pesan = "-Confirm password  tidak boleh kosong\n";
            registerForm.confirpassword.focus();
        }
         
        if (cpassword != "" && !cpassword.match(namaValid)) {
            pesan += "-Password harus lebih bervariasi\n";
            registerForm.confirpassword.focus();
        }
        
         
        if (pesan != "") {
            alert("Maaf, ada kesalahan pengisian Formulir : \n"+pesan);
            return false;
        }
    return true
    }

</script>


   	
<div id="register-modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="">
<div class="modal-content" style="margin:50px;">
<div class="modal-header login_modal_header">
<button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
<h2 id="myModalLabel" class="modal-title">Create Your Account</h2>
</div>
<div class="modal-body login-modal">
<p>Silahkan Masukkan Data Anda Di Formulir Register Dibawah ini.</p>
<br>
<div class="clearfix"></div>
<div id="social-icons-conatainer"> 
<form id="registerForm" name="registerForm" method="POST" action="" enctype="multipart/form-data" onSubmit="return validasiForm()">
<div class="modal-body-left">

<div class="form-group">
<input id="userrname" name="userrname" class="form-control login-field" placeholder="Ketikkan nama anda" type="text">
</div>
<div class="form-group">
<textarea id="useraddress" name="useraddress" class="form-control login-field" placeholder="Ketikkan alamat rumah anda" value=""></textarea>
</div>
<div class="form-group">
<input id="city" name="city" class="form-control login-field" placeholder="Ketikkan kota anda" value="" type="text">
</div>
<div class="form-group">
<input id="phone" name="phone" class="form-control login-field" placeholder="Ketikkan nomor telepon anda" value="" type="text">
</div>
<div class="form-group">
<input id="hp" name="hp" class="form-control login-field" placeholder="Ketikkan nomor handphone anda" value="" type="text">
</div>
<div class="form-group">
<input id="jalan" name="jalan" class="form-control login-field" placeholder="Ketikkan nama jalan rumah anda" value="" type="text">
</div>
<div class="form-group">
<input id="blok" name="blok" class="form-control login-field" placeholder="Ketikkan Blok rumah anda" value="" type="text">
</div>   
 <div class="form-group">
<input id="nomor" name="nomor" class="form-control login-field" placeholder="Ketikkan nomor rumah anda" value="" type="text">
</div>
<div class="form-group"> </div>
<p>Klik tombol Simpan Data untuk menyimpan data anda.</p>
</br>
<input type="submit" value="Simpan Data" name="submit" />
<input type="reset" value="Reset Form" name="reset" />
</div>
<div class="modal-body-right">
<input type="hidden" name="id" id="id" value="0">
<div class="form-group">
<input id="rt" name="rt" class="form-control login-field" placeholder="Ketikkan nomor Rt" value="" type="text">
</div>
<div class="form-group">
<input id="rw" name="rw" class="form-control login-field" placeholder="Ketikkan nomor Rw" value="" type="text">
</div>
<div class="form-group">
<input id="kelurahan" name="kelurahan" class="form-control login-field" placeholder="Ketikkan nama kelurahan" value="" type="text">
</div>
<div class="form-group">
<input id="kecamatan" name="kecamatan" class="form-control login-field" placeholder="Ketikkan nama kecamatan" value="" type="text">
</div>
<div class="form-group">
<input id="kabupaten" name="kabupaten" class="form-control login-field" placeholder="Ketikkan nama kabupaten" value="" type="text">
</div>
<div class="form-group">
<input id="propinsi" name="propinsi" class="form-control login-field" placeholder="Ketikkan nama propinsi" value="" type="text">
</div>
<div class="form-group">
<input id="kodepos" name="kodepos" class="form-control login-field" placeholder="Ketikkan kode pos" value="" type="text">  
</div>
<div class="form-group">
<input id="email" name="email" class="form-control login-field" placeholder="Ketikkan alamat email anda" value="" type="text">
</div>
<div class="form-group">
<input id="password" name="password" class="form-control login-field" placeholder="Ketikkan password anda" value="" type="password">
</div>
<div class="form-group">
<input id="confirpassword" name="confirpassword" class="form-control login-field" placeholder="Konfimasi password anda" value="" type="password">
</div>
</div>
</form>
</div>
<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<div class="modal-footer login_modal_footer"> </div>
</div>
</div>
</div>
</div>