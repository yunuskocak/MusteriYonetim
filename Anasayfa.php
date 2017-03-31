<?php
/**
 * Created by PhpStorm.
 * User: wsan
 * Date: 09.03.2016
 * Time: 17:48
 */
$title="Personel Ana Sayfas�";
//require_once 'Include/Baslik.php';
require_once(__DIR__.'/Model/AkademikPersonel.class.php'); // Session icerisindeki nesnenin olu�turulabilmesi i�in gerekli
//require_once 'Guvenlik/PersonelDenetim.php'; //Site i�erisindeki t�m sayfalara eklenmeli...
require_once (__DIR__.'/Model/ModelFactory.class.php');
require_once (__DIR__.'/Model/AkademikPersonelGoruntuleJSON.class.php');
//session_start();
//$_SESSION['akademikPersonel']->getAdi();
//echo "aaa".$_SESSION['personelNo'];
?>

<!DOCTYPE html>
<head>
    <title>��renci Bilgi Sistemi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://getbootstrap.com/examples/sticky-footer-navbar/sticky-footer-navbar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body >

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">��renci Bilgi Sistemi</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Giri� Sayfas�</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">��renci ��lemleri <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#" id="ogrenciArama">Arama</a></li>
                    <li><a href="#" id="ogrenciEkleme">Ekleme</a></li>
                    <li><a href="#">Silme</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Ders ��lemleri</li>
                    <li><a href="#">Ders Kay�t</a></li>
                    <li><a href="#">Not Giri�i</a></li>
                </ul>
            </li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php //var_dump($_SESSION);
                $ap=$_SESSION['akademikPersonel']; echo $ap->getAdi()." ". $ap->getSoyadi();?> <span class="caret"></span></a>
                <input type="hidden" id="personelNo" value="<?php echo $ap->getPersonelNo();?>">
                <ul class="dropdown-menu">
                    <li><?php echo "".ModelFactory::getModel('AkademikPersonelGoruntuleJSON')->getKisi($ap);?></li>
                    <li><a href="#">�ifre De�i�tir</a></li>
                    <li><a href="Include/Cikis.php">  <span class="glyphicon glyphicon-log-out" style="alignment: "></span> &nbsp; ��k��</a></li>
                </ul>
            </li>

        </ul>

    </div>
</nav>

<div class="container">
    <!--<div class="page-header">
        <h3>Ana Sayfa</h3>
    </div>-->
    <div class="row" >
        <div class="col-md-10 ">
            <div class="panel panel-default" id="icerik">
                <div class="panel-heading" >Giri� Sayfas�
                </div>

                <div class="panel-body" > Giri� Sayfas�   </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Duyurular</div>

                <div class="panel-body" id="messages1" style="max-height: 200px">
                    <!--<ol>
                        <li>Duyuru1</li>
                        <li> </li>
                    </ol>-->
                    <!--Library/NodeJS klas�r�ndeki sunucu ba�lat�lmal�-->
                    <div id="duyurular"></div>


                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Mesajlar</div>
                <div class="panel-body"  style="max-height: 200px">
                    <input type="text" id="m" class="form-control input-sm" placeholder="Mesaj�n�z"/>
                    <p id="mesajlar" class=".text-success"></p>
                </div>
            </div>
        </div>
    </div>


</div>

<footer id="footer" class="footer">
    <div class="container">
        <p class="text-muted">��renci Bilgi Sistemi</p>
    </div>
</footer>
<!--<script src="https://cdn.socket.io/socket.io-1.0.0.js"></script>-->
<script>
    $(function()
    {
        // Mesajla�ma....
       /* var socket = io.connect('http://localhost:8000');
        // on every message recived we print the new datas inside the #container div
        socket.on('notification', function (data) {
            //alert (data);
            // convert the json string into a valid javascript object
            var data = JSON.parse(data);
            //alert (_data);
            // $('#duyurular').append(new Date());
            $('#duyurular').empty();
            /!*$.each(data, function(i, item) {
             $('#duyurular').append(i);
             });?*!/
            $('#duyurular').append(data.Duyurular.duyuru.duyuruNo);
            $('#duyurular').append(data.Duyurular.duyuru.duyuruAyrinti);
        });
        // Mesajla�ma....
        socket.on('mesaj', function(msg){
            $('#mesajlar').prepend('<small class=\"text-success\">'+msg+'</small><br>');
        });
        $('#m').on('keypress', function (event)
        {
            if((event.which === 13)&&( $('#m').val()!='')) {
            //alert('blur');
                var gonderilecekMesaj= $('#personelNo').val()+':'+$('#m').val();
            socket.emit('mesaj', gonderilecekMesaj);
            $('#m').val('');
            }
            //return false;
        });*/
        $('#ogrenciArama,#ogrenciSilme,#ogrenciDuzenleme').click(function()
        {
            $.ajax({
                url: 'OgrenciArama.php',
                type: 'GET',
                //data: form_data,
                success: function(msg)
                {
                    // $("#listele").slideDown("500");
                    $("#icerik").html(msg).fadeIn("slow");//.fadeOut("slow");
                },
                error: function()
                {
                    alert("Hata meydana geldi. L�tfen tekrar deneyiniz !!!");
                }
            });
        });
        $('#ogrenciEkleme').click(function()
        {
            $.ajax({
                url: 'OgrenciEkle.php',
                type: 'GET',
                //data: form_data,
                success: function(msg)
                {
                    // $("#listele").slideDown("500");
                    $("#icerik").html(msg).fadeIn("slow");//.fadeOut("slow");
                },
                error: function()
                {
                    alert("Hata meydana geldi. L�tfen tekrar deneyiniz !!!");
                }
            });
        });
    });
</script>



</body>
</html>