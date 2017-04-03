<!DOCTYPE html>
<?php
 require_once "VeritabaniBaglanti.php";

parse_str($_SERVER['QUERY_STRING'], $output);
$sql="SELECT * FROM musteri where id=". $output['ID'];//".$_SERVER['ID'];
 
$result = mysql_query($sql);

if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
else
	$rowMusteriBilgileri = mysql_fetch_row($result);

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
            <a href="Anasayfa.php" class="logo">Müşteri Yönetim</a>
            <!--logo end-->

            <div class="top-nav notification-row" >                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
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
					<h3 class="page-header"> Müşteri Güncelleme</h3>
					<ol class="breadcrumb">
						<li><a href="Anasayfa.php">Anasayfa</a></li>
						<li>Müşteri Güncelleme</li>						  	
					</ol>
				</div>
			</div>
		   <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Müşteri Bilgileri
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal " id="register_form" method="get" action="">
                                      <div class="form-group ">
                                          <label for="fullname" class="control-label col-lg-2">İsim <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class=" form-control" id="inputAdSoyad" name="inputAdSoyad" type="text" value="<?php echo $rowMusteriBilgileri[0] ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="address" class="control-label col-lg-2">Adres <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class=" form-control" id="inputAdres" name="inputAdres" type="text" value="<?php echo $rowMusteriBilgileri[1] ?>"/>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="username" class="control-label col-lg-2">Kullanıcı Adı <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="inputKAdi" name="inputKAdi" type="text" value="<?php echo $rowMusteriBilgileri[2] ?>"/>
                                          </div>
                                      </div> 
                                      <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                                          <div class="col-lg-4">
                                              <input class="form-control " id="inputEmail" name="inputEmail" type="email" value="<?php echo $rowMusteriBilgileri[3] ?>"/>
                                          </div>
                                      </div> 
									  <div class="form-group ">
                                          <label for="email" class="control-label col-lg-2">Aktif ? <span class="required">*</span></label>
                                          <div class="col-lg-4">
									        <label>
												<input type="checkbox" id="chkAktif" name="chkAktif"   style="width:50px; margin-top:10px;height:20px" value="">
											</label>
										  </div>
                                      </div> 
									  <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <p class="btn btn-primary" id="MusteriGuncelle">Güncelle</p>
                                              <a class="btn btn-default" href="MusteriGuncelleme.php?ID=<?php echo $output['ID']; ?>" >İptal</a>
                                          </div>
                                      </div>
									  <div class="form-group " style="display:none">
                                              <input id="inputID" name="inputID" type="email" value="<?php echo $rowMusteriBilgileri[5] ?>"/>
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
 function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
	}

      $(document).ready(function() { 
			document.getElementById("AdSoyad").innerHTML = getCookie('AdSoyad').replace('+',' ');  
		
		$('#MusteriGuncelle').click(function() {
				
				 var form_data=$('form :input').serialize();
					
				$.ajax({
					type: "POST",
					url: 'ajaxMusteriGuncelleme.php',                        
					dataType : 'json',
					data: form_data,
					success: function (data213) {
								window.location=window.location.href;
							},
					error: function (sss) {
                                 alert('Müşteri bilgileri güncellenirken bir hata oluştu.');
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
