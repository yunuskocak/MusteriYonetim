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
		
<script  src="js/jquery-3.2.0.min.js" ></script>		
	<script>
	
	 $(document).ready(function()
        {
			
			$('#gonder').click(function() {
			
			var veri =
                {
                    kullaniciAdi: $('#inputKullaniciAdi').val(),
                    parola: $('#inputPassword').val()
                };
				
                $.ajax({
                    url: "ajaxLogin.php",
                    type: 'POST',
                    data: veri,
                    success: function(msg)
                    {	
						alert("Kayıt başarıyla eklenmiştir...");
                    },
                    error: function()
                    {
                        alert("Hata meydana geldi. Lütfen tekrar deneyiniz !!!");
                    }
                });
			});
		
		});
		 
		
		
	</script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Giriş</h2>
        <label for="inputEmail" class="sr-only">Kullanıcı Adı</label>
        <input id="inputKullaniciAdi" class="form-control" placeholder="Kullanıcı Adı" required autofocus>
        <label for="inputPassword" class="sr-only">Parola</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Parola" required>
         
		<!--<input style="" type="submit"  class="btn btn-lg btn-primary btn-block" id="girisYap" value="Giriş Yap" />-->
        <input type="submit" id="gonder" value="Kaydet"/>

       </form>

    </div> <!-- /container -->

  </body>
</html>
