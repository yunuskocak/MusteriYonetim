<?php

	if (!@$baglanti=mysql_connect("localhost","root","g1z3mu91")){
    die("Mysql'e bağlantı kurulamadı!".mysql_error());
}
 
if (!@mysql_select_db("musteri",$baglanti)){
    die("Veritabanına bağlantı kurulamadı!".mysql_error());
}
	
?>

