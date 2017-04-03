<?php

 require_once "VeritabaniBaglanti.php";
 parse_str($_SERVER['QUERY_STRING'], $output);
$sql="UPDATE musteri SET adSoyad = '".$_POST['inputAdSoyad']."',
						 adres = '".$_POST['inputAdres']."', 
						 kullaniciAdi = '".$_POST['inputKAdi']."', 
						 email = '".$_POST['inputEmail']."', 
						 aktif = '".$_POST['inputAktiflik']."'
	  WHERE id = '".$_POST['inputID']."';";

	$result = mysql_query($sql);

	if($result)
{ 
	$dataGuncelle= array ('sonuc'=>$output['ID']);
}
else 
{
	$dataGuncelle= array ('sonuc'=>$output['ID']);
}
	
	echo json_encode($dataGuncelle);