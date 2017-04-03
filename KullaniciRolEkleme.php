<!DOCTYPE html>
<?php
 require_once "VeritabaniBaglanti.php";

$sql="SELECT kullaniciAdi FROM kullanici where aktif='1'";
 
$kullanicilar = mysql_query($sql);

if (!$kullanicilar) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

mysql_close(); 

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Müşteri Yönetim</title>
<!-- Bootstrap CSS -->    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" /> 
	<link href="assets/css/widgets.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet" />
	<link href="assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  </head>
  <body>
  <!-- container section start -->
  <section id="container" class="">
      <header class="header dark-bg">
            <!--logo start-->
            <a href="Anasayfa.html" class="logo">Müşteri Yönetim</a>
            <!--logo end-->

            <div class="top-nav notification-row" >                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username" id ="AdSoyad"></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> Profilim</a>
                            </li>
                            <li>
                                <a id="Logout"><i class="icon_key_alt"></i> Çıkış</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">  
				  <li class="sub-menu active">
                      <a href="javascript:;" class="">
                          <span>Yönetim Ekranları</span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="MusteriGoruntuleme.php">Müşteri İşlemleri</a></li>                          
						  <li><a class="" href="MusteriEkleme.php">Müşteri Ekleme</a></li>                    
                          <li><a class="" href="KullaniciEkleme.php" id="liKullaniciEkleme">Kullanıcı Ekleme</a></li>                  
                          <li><a class="" href="KullaniciRolEkleme.php" id="liKullaniciRolEkleme">Kullanıcı Rol Ekleme</a></li>                        
                       </ul>
                  </li>       
				  <li class="sub-menu">
                  <li>                     
                      <a class="" href="chart-chartjs.html">
                          <span>Raporlar</span>
                      </a>                 
                  </li> 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
    <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"> Kullanıcı Rol Ekleme</h3>
					<ol class="breadcrumb">
						<li><a href="Anasayfa.php">Anasayfa</a></li>
						<li>Kullanıcı Ekleme</li>						  	
					</ol>
				</div>
			</div>
		   <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kullanıcı Bilgileri
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="register_form" method="get" action="">
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Kullanıcı Adı <span class="required">*</span></label>
                                          <div class="col-lg-4">
											<?php echo '<select name="inputKAdi" id="inputKAdi">';
											while ($KullaniciAdiRow = mysql_fetch_row($kullanicilar))
											{
													echo '<option value="'.$KullaniciAdiRow[0].'" >'.$KullaniciAdiRow[0].'</option>';
											}
											echo "</select>";
											?>
									  </div>
                                      </div>
                                      <div class="form-group ">
                                        <label class="control-label col-lg-2">Yetki Kodu <span class="required">*</span></label>
										<div class="col-lg-4">
											<table>
												<tr>
													<td>
													<select name="inputYetki" id="inputYetki">
													<option value= "Admin">Admin</option>
													<option selected="selected" value= "User">User</option>
													</select>
													</td>
												</tr>
											</table>
										</div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <p class="btn btn-primary" id="KullaniciRolEkle">Kaydet</p>
                                              <a class="btn btn-default" href="KullaniciRolEkleme.php">İptal</a>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </section>
                  </div>
              </div>
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="js/owl.carousel.js" ></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
  <script>
 
      $(document).ready(function() {
          
        $('#mesaj').hide();
		$('#mesajSuccess').hide();
		
	document.getElementById("AdSoyad").innerHTML = getCookie('AdSoyad');

		   	$('#KullaniciRolEkle').click(function() {
				var form_data=$('form :input').serialize();
		
				$.ajax({
					type: "POST",
					url: 'ajaxKullaniciRolEkleme.php',                        
					dataType : 'json',
					data: form_data,
					success: function (data) {
								alert("Kayıt Yapıldı");
							},
					error: function (sss) {
                               alert("Kayıt Yapılamadı");
							}
					  });
				});
				
	if(getCookie('yetki') == 'Admin'){
		document.getElementById("liKullaniciRolEkleme").style.display = "block";
		document.getElementById("liKullaniciEkleme").style.display = "block";
	  }
	else if(getCookie('yetki') == 'User'){
		document.getElementById("liKullaniciRolEkleme").style.display = "none";
		document.getElementById("liKullaniciEkleme").style.display = "none";
	}
	else {
		alert("Lütfen yetkiniz dahilinde giriş yapınız.");
		window.location = "login.php";
	}
	
				$('#Logout').click(function() {
				deleteAllCookies();
				window.location = "login.php";
					});
      });
	  
	  function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

	  function getCookie(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
			}
		return "";
	}
 
 
  </script>

  </body>
</html>
