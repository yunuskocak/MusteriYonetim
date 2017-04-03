<?php

 require_once "VeritabaniBaglanti.php";
 
$sql="INSERT INTO musteri (adSoyad, adres, kullaniciAdi, email, aktif) VALUES ('".$_POST['inputAdSoyad']."', '".$_POST['inputAdres']."', '".$_POST['inputKAdi']."','".$_POST['inputEmail']."', '1')";

	$result = mysql_query($sql);

	
	echo json_encode($data);