<?php
if(!empty($_POST['messagetodecrypt']) && !empty($_POST['keydec'])) {
    $message = str_split(strtoupper(trim($_POST['messagetodecrypt'], " ")));
    $keys = str_split(strtoupper(trim($_POST["keydec"], " ")));
    foreach ($message as $key => $value) {
        $sum = ord($value) - ord($keys[$key]);
        $resdec .= chr(($sum + 26) % 26 + ord('A'));
    }
    $resultencrypt = array('textdecrypt' => $resdec);
    echo json_encode($resultencrypt);
}
?>
