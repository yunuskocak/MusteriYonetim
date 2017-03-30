<?php
require_once "VeritabaniBaglanti.php";

$sql="SELECT * FROM \"kullanici\" where \"kullaniciAdi\" = '".$_POST['kullaniciAdi']."' and \"parola\" = '".$_POST['parola']."'";

$result = pg_query($baglantiNo,$sql);

pg_close($baglantiNo);

if(pg_num_rows($result)!=0)
	echo 'basarili';
else
	echo 'basarisiz';

?>
