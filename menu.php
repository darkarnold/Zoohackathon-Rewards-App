<?php
class Menu {
  protected $text;
  protected $sessionId;

  function __construct(){}

  public function mainMenuRegisteredUsers($name) {
    // show menu for registered users
    $response = 'Welcome' .$name .'to the wildlife reward program. Reply with \n';
    $response .= '1. Report wild animal sighting \n';
    $response .= '2. View reward points \n';
    $response .= '3. Redeem reward points \n';
    $response .= '4. Opt out\n';

    return $response;
  }

  public function mainMenuUnregisteredUsers() {
    // show menu for unregistered users
    $response = 'CON Welcome to the wildlife reward program. Reply with \n';
    $response .= '1. Register \n';
    echo $response;
}

public function registerUsers($textArray,$phoneNumber) {
  // register users
  $menulevel = count($textArray);
  if($menulevel == 1) {
    echo  'CON Please enter your name \n';
    
  }elseif($menulevel == 2) {
    echo 'CON Please enter your NIN or identification number \n';
  
}else {
  echo 'END Thank you have been registered \n';

  $sms = new Sms(); 
  $message = ' you have been  registered';
  $sms->sendSms($phoneNumber,$message);
}
}

public function reportSighting() {
  // report sighting
  $response = 'CON Type of animal sighting \n';
  $response .= '1. Hippo \n';
  $response .= '2. Lion \n';
  $response .= '3. Pangolin \n';
  $response .= '4. Rhino \n';
  $response .= Util::$GO_TO_MAIN_MENU . ' Main menu \n';

  echo "CON" .$response;
}

public function reportSightingHippo($textArray) {
  // report sighting hippo
  $menulevel = count($textArray);
  if($menulevel == 1) {
    echo 'END Thank you for reporting the sighting. You will be contacted shortly \n';
    $sms = new Sms();
    $message = 'You have reported a sighting of a hippo and your message has been received. The authorities wil be in touch shortly';
    $sms->sendSms($phoneNumber,$message);
  }
}

public function middleware($text) {
  return $this->$goToMainMenu($text);
}

public function goToMainMenu($text){
  $explodedText = explode('*',$text);
  while(array_search(Util::$GO_TO_MAIN_MENU,$explodedText) !== false) {
    $index = array_search(Util::$GO_TO_MAIN_MENU,$explodedText);
    $firstPart = array_slice($explodedText,0,$index);
  }
  return join('*',$explodedText);
}
}
?>