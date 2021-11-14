<?php 
include_once('menu.php');

$isUserRegistered = false;

$sessionId = $POST['sessionId'];
$serviceCode = $POST['serviceCode'];
$phoneNumber = $POST['phoneNumber'];
$text = $POST['text'];

$menu = new Menu();

$text = $menu->middleware($text);

if($text =="" && $isUserRegistered ==true) {
  echo "CON" .$menu->mainMenuRegisteredUsers('<> Name here');
}elseif ($text =="" && $isUserRegistered ==false) {
  $menu->mainMenuRegisteredUsers();
}elseif ($isUserRegistered ==false) {
  $textArray = explode("*", $text);
  switch($textArray[0]){
   case 1:
    $menu->registerUsers($textArray, $phoneNumber);
    break;
    default:
    echo "END Invalid input Please try again";
  }
}
elseif($isUserRegistered ==true) {
  $textArray = explode("*", $text);
  switch($textArray[0]){
   case 1:
    $menu->reportSighting($textArray, $sessionId);
    break;
    default:
    echo "END Invalid input Please try again";
  }
 }
 else {
$textArray = explode("*", $text);
switch($textArray[0]){
  case 1:
    $menu->reportSightingHippo($textArray, $sessionId);
    break;
    default:
    echo "END Invalid input Please try again";
  }
}
 
  
?>