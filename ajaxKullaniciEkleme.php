<?php

 require_once "VeritabaniBaglanti.php";
 
$sql="INSERT INTO kullanici (adSoyad, kullaniciAdi, parola, aktif) VALUES ('".$_POST['inputAdSoyad']."', '".$_POST['inputKAdi']."', '".$_POST['inputSifre']."', '1')";

	$result = mysql_query($sql);
if($row[0] == null)
	$data= array ('sonuc'=>'0');
else{
	$data= array ('sonuc'=>'1');
 
}
	
	echo json_encode($data);