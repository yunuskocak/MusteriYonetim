<?php

	$sunucu="localhost";
	$veritabani="Musteri";
	$kullaniciAdi="ykocak";
	$sifre="YKocak25";  
	
	$baglantiNo= pg_connect("host=$sunucu dbname=$veritabani user=$kullaniciAdi password=$sifre");
	
	if (pg_last_error())
	{
		echo "bağlantı başarısız... " . pg_last_error();
	}
	
?>