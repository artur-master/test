<?php
  $response = [];

  if(isset($_SERVER['HTTP_X_HELLO_WORLD'])) {
    $header = $_SERVER['HTTP_X_HELLO_WORLD'];
    if($header != "test") { echo("invalid header"); exit; }

    $response["ip"] = $_SERVER["HTTP_X_FORWARDED_FOR"];

    if(isset($_GET['name'])) {
      $response["greeting"] = $_GET["name"];
    }

    header('Content-Type: application/json');
    echo(json_encode($response));
  }
?>
