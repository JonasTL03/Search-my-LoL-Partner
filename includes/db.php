<?php

  $servername = "localhost";
  $user = "root";
  $pw = "";
  $db = "autofill";

  $con = new mysqli($servername, $user, $pw, $db);

  if($con->connect_error) {
    die("Die Datenbank ist nicht erreichbar. ".$con->connect_error);
  };

?>
