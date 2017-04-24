<?php
 
 require_once "VeritabaniBaglanti.php";

 $kullaniciAdiStr=filter_var($_POST['inputKAdi'], FILTER_SANITIZE_STRING); 

 if (strlen($kullaniciAdiStr)>20)
	echo "Kullanıcı Adı Girişi Max 20 Karakter Olmalıdır";

 
if(!$_POST['inputKAdi'])
	$sql="SELECT * FROM musteri";
else 
	$sql="SELECT * FROM musteri where kullaniciAdi ='".$kullaniciAdiStr."'";
	
$result = mysql_query($sql);
 
 mysql_close(); 

?>
<table class="table table-striped table-advance table-hover">
    <tbody>
       <tr>
          <th> İsim Soyisim</th>
          <th>Adres</th>
          <th>Kullanıcı Adı</th>
          <th>Email</th>								 
          <th>Aktiflik</th> 								 
          <th>İşlemler</th>
       </tr> 
	<?php 
		while ($row1 = mysql_fetch_row($result))
		{
			$rowAdSoyadStr=filter_var($row1[0], FILTER_SANITIZE_STRING);
			$rowAdresStr=filter_var($row1[1], FILTER_SANITIZE_STRING);
			$rowKadiStr=filter_var($row1[2], FILTER_SANITIZE_STRING);
			$rowEmailStr=filter_var($row1[3], FILTER_SANITIZE_STRING);
			
			echo ' <tr> ';
			echo '<td>'.$rowAdSoyadStr.'</td><td>'.$rowAdresStr.'</td><td>'.$rowKadiStr.'</td><td>'.$rowEmailStr.'</td><td>Aktif</td>'; 
			echo '<td> <div class="btn-group">';
            echo '  <a class="btn btn-primary" href="MusteriGuncelleme.php?ID='.$row1[5].'">Güncelle</a>';
            echo '  <p class="btn btn-danger" onClick="MusteriSil('.$row1[5].')">&nbsp&nbsp&nbsp&nbspSil&nbsp&nbsp&nbsp&nbsp</p>';
            echo '</div>';
			echo '</td>';
			echo ' <tr> '; 
		} 
	?>
</tbody>
</table>

