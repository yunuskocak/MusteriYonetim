<?php

 require_once "VeritabaniBaglanti.php";
  
  $kullaniciAdiStr = filter_var($_POST['inputKAdi'],FILTER_SANITIZE_STRING);
  $yetkiKoduStr = filter_var($_POST['inputYetki'],FILTER_SANITIZE_STRING);
 
  if (strlen($kullaniciAdiStr)>20)
	echo "Kullanıcı Adı  Girişi Max 20 Karakter Olmalıdır";
	
$sql="INSERT INTO kullaniciyetki (kullaniciAdi, yetkiKodu) VALUES";
$sql=$sql." ('".$kullaniciAdiStr."', '".$yetkiKoduStr."')";

	$result = mysql_query($sql);
if($row[0] == null)
	$data= array ('sonuc'=>'0');
else{
	$data= array ('sonuc'=>'1');
 
}
	
	echo json_encode($data);