<?php

 require_once "VeritabaniBaglanti.php";
 
 $kullaniciAdiStr = filter_var($_POST['inputKullaniciAdi'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
 $kullaniciSifreStr = filter_var($_POST['inputPassword'],FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
 
  if (strlen($kullaniciAdiStr)>20)
	echo "Kullanıcı Adı  Girişi Max 20 Karakter Olmalıdır";
 
 $sql="SELECT * FROM kullanici where kullaniciAdi=";
 $sql =$sql . "'".$kullaniciAdiStr."' and parola = '".$kullaniciSifreStr."'";

	$result = mysql_query($sql);
	
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

$row = mysql_fetch_row($result);

if($row[0] == null)
	$data= array ('sonuc'=>'0');
else{
	$data= array ('sonuc'=>'1');
 //Kullanıcı adı cookie
setcookie("AdSoyad", $row[1]);
//Kullanıcı adı end

//Müşteri sayısı sorgusu
 $mustSayi = "SELECT count(id) FROM musteri";
 $musteriSayi = mysql_query($mustSayi);
 
if(!$musteriSayi) {
    echo 'Could not run musteri query: ' . mysql_error();
    exit;
}
$musteriRow = mysql_fetch_row($musteriSayi);
 
	setcookie("MusteriSayi", $musteriRow[0]); 		
	//Müşteri sayısı end

	//Aktif müşteri sayısı sorgusu
$aktMustSayi = "SELECT count(id) FROM musteri WHERE aktif = '1'";
 $aktifMusteriSayi = mysql_query($aktMustSayi);
 
if(!$aktifMusteriSayi) {
    echo 'Could not run musteri query: ' . mysql_error();
    exit;
}
$aktifMusteriRow = mysql_fetch_row($aktifMusteriSayi);
 
	setcookie("AktifMusteriSayi", $aktifMusteriRow[0]); 
//Aktif müşteri sayısı end


//Kullanıcı bazlı rol sorgusu
$kullaniciRol = "SELECT yetkiKodu FROM kullaniciyetki WHERE kullaniciAdi='".$kullaniciAdiStr."'";
 $kulRol = mysql_query($kullaniciRol);
 
if(!$kulRol) {
    echo 'Could not run musteri query: ' . mysql_error();
    exit;
}

$kullaniciRolRow = mysql_fetch_row($kulRol);
 
	setcookie("yetki", $kullaniciRolRow[0]); 
//Kullanıcı bazlı rol end
}

//session_start();
//$_session['login_time']=time();
	
	echo json_encode($data);