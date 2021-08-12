<?php
  $response = [];

  if(isset($_SERVER['HTTP_X_HELLO_WORLD'])) {
    $header = $_SERVER['HTTP_X_HELLO_WORLD'];
    if($header != "test") { echo("invalid header"); exit; }

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $response["ip"] = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $response["ip"] = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $response["ip"] = $_SERVER['REMOTE_ADDR'];
    }    

    if(isset($_GET['name'])) {
      $response["greeting"] = $_GET["name"];
    }

    header('Content-Type: application/json');
    echo(json_encode($response));
  }
?>
