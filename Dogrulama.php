<?php

require_once 'Classes/ObjectFactory.class.php';

$userSession = ObjectFactory::getObject('SessionManagement');

if ($userSession->login($_POST['inputKullaniciAdi'], $_POST['inputPassword']))
{
    $data= array ('sonuc'=>'1');
}
else
{
    $data= array ('sonuc'=>'0');
}
echo json_encode($data);