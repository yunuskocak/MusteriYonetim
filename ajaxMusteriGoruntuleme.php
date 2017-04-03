<?php

 require_once "VeritabaniBaglanti.php";

if(!$_POST['inputKAdi'])
	$sql="SELECT * FROM musteri";
else
	$sql="SELECT * FROM musteri where kullaniciAdi ='".$_POST['inputKAdi']."'";
	
$result = mysql_query($sql);
 
//$musteriBilgileri=mysql_fetch_row($result);

// $sorguSonucuIl = mysqli_query($baglantiNo, "SELECT * FROM iller");
// $sorguSonucuIlce = mysqli_query($baglantiNo, "SELECT * FROM ilceler where il={$kayit[9]}");
 

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
			echo ' <tr> ';
			echo '<td>'.$row1[0].'</td><td>'.$row1[1].'</td><td>'.$row1[2].'</td><td>'.$row1[3].'</td><td>'.$row1[3].'</td>'; 
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

