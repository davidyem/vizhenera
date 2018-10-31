<?php
if(!empty($_POST['messagetoencrypt']) && !empty($_POST['key'])) {
    $message = str_split(strtoupper(trim($_POST["messagetoencrypt"], " ")));
    $keys = strtoupper(trim($_POST["key"], " "));
    if(strlen($keys) != sizeof($message)) {
        $keys = str_repeat($keys, (int)(sizeof($message) / strlen($keys) + 1));
    }
    //$keys = substr($keys, 0, sizeof($message));
    $keys = str_split($keys);
    foreach ($message as $key => $value) {
        /*if(ord($value) == 32){
            $res .= ' ';
        }else{
            $sum = ord($value) + ord($keys[$key]);
            $res .= chr($sum % 26 + ord('A'));
        }*/
        $sum = ord($value) + ord($keys[$key]);
        $res .= chr($sum % 26 + ord('A'));
    }
    $keys = implode($keys);
    $resultencrypt = array('textencrypt' => $res, 'keys' => $keys);
    echo json_encode($resultencrypt);
}
?>