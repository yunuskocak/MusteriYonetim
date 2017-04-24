<?php 
 require_once "VeritabaniBaglanti.php";
  
  $sql="delete  from musteri where id =".$_POST[id];

  $result = mysql_query($sql);  

  if($result) 
  	$dataSilme= array ('sonuc'=>'1'); 
  else  
  	$dataSilme= array ('sonuc'=>'0'); 
  
  echo json_encode($dataSilme);