<?php

  if(isset($_POST['register_submit'])){

    // Passwort Hash
    $passwort = hash("sha512", $_POST['passwort']);


    if($_POST['division'] == "Division"){
      $division = "";
    }else{
      $division = $_POST['division'];
    }

    $sql = "INSERT INTO user (name, ingame_name, email, passwort, liga, division, user_alter) VALUES ('$_POST[name]', '$_POST[ingame_name]', '$_POST[email]', '$passwort', '$_POST[liga]', '$division', '$_POST[user_alter]')";

    if($con->query($sql) === TRUE) {
    }else{
      echo "Fehler bei der Registrierung!" .$con->error;
    }
    echo "OK";
  }
?>
