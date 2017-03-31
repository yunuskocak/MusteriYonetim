<?php

 require_once "VeritabaniBaglanti.php";
 
// $sql="SELECT * FROM \"kullanici\" where \"kullaniciAdi\" = '".$_POST['kullaniciAdi']."' and \"parola\" = '".$_POST['parola']."'";
 //$sql="SELECT * FROM kullanici";
 //mysql_query($sql) or die ("Sorgu Çalıştırılamadı"); 
//	throw new Exception $_POST['inputKullaniciAdi'];
	//throw new Exception('<p>Sınıf Bulunamadı</p>');
	
$sql="SELECT * FROM kullanici where kullaniciAdi = '".$_POST['inputKullaniciAdi']."' and parola = '".$_POST['inputPassword']."'";

	$result = mysql_query($sql);
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);
if($row[0] == null)
	$data= array ('sonuc'=>'0');
else{
	//if($row[1] == $_POST['inputPassword'])
	$data= array ('sonuc'=>'1');							
	//else
	//$data= array ('sonuc'=>'0');							
}
	
	echo json_encode($data);