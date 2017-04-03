<?php
	echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">  
	
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		
<script  src="js/jquery-3.2.0.min.js" ></script>		
	
  </head>

  <body>

    <div class="container">
      <form class="form-signin" id="girisForm">
        <h2 class="form-signin-heading">Giriş</h2>
        <label >Kullanıcı Adı</label>
        <input id="inputKullaniciAdi" name="inputKullaniciAdi" class="form-control" placeholder="Kullanıcı Adı" autofocus>
        <label >Parola</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Parola" >

		<button class="btn btn-lg btn-primary btn-block" type="submit" id="gonder">Giriş</button>         
		<!-- <input type="button" class="btn btn-lg btn-primary btn-block" id="gonder" value="Kaydet" />-->

       </form>

    </div> <!-- /container -->
<script>
	
	 $(document).ready(function(){
		 
		 	$('#gonder').click(function() {
				var form_data=$('form :input').serialize();
		
				$.ajax({
					type: "POST",
					url: 'ajaxLogin.php',                        
					dataType : 'json',
					data: form_data,
					success: function (data) {
								if (data['sonuc']=='1')
								{
									window.location = 'AnaSayfa.php';
								}
								else if(data['sonuc'] == '0'){
									alert("Yetkiler yetersiz");
								}
							},
					error: function (sss) {
							alert("Error!!!"+sss.responseText);
							}
					  });
				});
		
		});
		 
		
		
	</script>
  </body>
</html>
