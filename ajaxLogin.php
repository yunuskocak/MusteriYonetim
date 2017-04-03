<?php

 require_once "VeritabaniBaglanti.php";
 
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
$kullaniciRol = "SELECT yetkiKodu FROM kullaniciyetki WHERE kullaniciAdi='".$_POST['inputKullaniciAdi']."'";
 $kulRol = mysql_query($kullaniciRol);
 
if(!$kulRol) {
    echo 'Could not run musteri query: ' . mysql_error();
    exit;
}
$kullaniciRolRow = mysql_fetch_row($kulRol);
 
	setcookie("yetki", $kullaniciRolRow[0]); 
//Kullanıcı bazlı rol end
	
}
	
	echo json_encode($data);