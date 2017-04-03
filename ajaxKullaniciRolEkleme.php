<?php

 require_once "VeritabaniBaglanti.php";
 
$sql="INSERT INTO kullaniciyetki (kullaniciAdi, yetkiKodu) VALUES ('".$_POST['inputKAdi']."', '".$_POST['inputYetki']."')";

	$result = mysql_query($sql);
if($row[0] == null)
	$data= array ('sonuc'=>'0');
else{
	$data= array ('sonuc'=>'1');
 
}
	
	echo json_encode($data);