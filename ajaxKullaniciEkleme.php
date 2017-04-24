<?php

 require_once "VeritabaniBaglanti.php";
 
 $adSoyadStr = filter_var($_POST['inputAdSoyad'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
 $kullaniciAdiStr = filter_var($_POST['inputKAdi'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
 $sifreStr = filter_var($_POST['inputSifre'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
 
   if (strlen($adSoyadStr)>40)
	echo "Ad Soyad Girişi Max 40 Karakter Olmalıdır";
  else if (strlen($kullaniciAdiStr)>20)
	echo "Kullanıcı Adı Girişi Max 20 Karakter Olmalıdır";

 
 $sql="INSERT INTO kullanici (adSoyad, kullaniciAdi, parola, aktif)";

 $sql= $sql + "VALUES ('".$adSoyadStr."', '".$kullaniciAdiStr ."', '".$sifreStr."', '1')";

	$result = mysql_query($sql);
if($row[0] == null)
	$data= array ('sonuc'=>'0');
else{
	$data= array ('sonuc'=>'1');
 
}
	
	echo json_encode($data);