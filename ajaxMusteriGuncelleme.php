<?php

 require_once "VeritabaniBaglanti.php";
 parse_str($_SERVER['QUERY_STRING'], $output);
 
  $adSoyadStr 		= filter_var($_POST['inputAdSoyad'], FILTER_SANITIZE_STRING); 
  $adresStr		 	= filter_var($_POST['inputAdres'], FILTER_SANITIZE_STRING); 
  $kullaniciAdiStr 	= filter_var($_POST['inputKAdi'], FILTER_SANITIZE_STRING); 
  $emailStr 		= filter_var($_POST['inputEmail'], FILTER_SANITIZE_STRING,FILTER_VALIDATE_EMAIL); 
  
  if (strlen($adSoyadStr)>40)
	echo "Ad Soyad Girişi Max 40 Karakter Olmalıdır";
  else if (strlen($adresStr)>50)
	echo "Adres Girişi Max 50 Karakter Olmalıdır";
  else if (strlen($kullaniciAdiStr)>20)
	echo "Kullanıcı Adı Girişi Max 20 Karakter Olmalıdır";

   if(!filter_var($emailStr,FILTER_VALIDATE_EMAIL))
	   echo "Email Adresi Hatalıdır";
   
	$sql="UPDATE musteri SET adSoyad = '".$adSoyadStr."',
						 adres = '".$adresStr."', 
						 kullaniciAdi = '".$kullaniciAdiStr."', 
						 email = '".$emailStr."', 
						 aktif = '1'
	  WHERE id = '".$_POST['inputID']."';";

	$result = mysql_query($sql);

	if($result) 
		$dataGuncelle= array ('sonuc'=>$output['ID']); 
	else  
		$dataGuncelle= array ('sonuc'=>$output['ID']); 
		
echo json_encode($dataGuncelle);