
<?php 
session_start();
if(isset($_SESSION['id'])) {
  header("Location: /schaumparty/meinProfil.php");
}
?><?php

  $servername = "localhost";
  $user = "root";
  $pw = "";
  $db = "autofill";

  $con = new mysqli($servername, $user, $pw, $db);

  if($con->connect_error) {
    die("Die Datenbank ist nicht erreichbar. ".$con->connect_error);
  };

?>
<?php
 
   if(isset($_POST['login_submit'])){
     $sql = "SELECT * FROM user WHERE email = '$_POST[email]'";
 
     $res = $con->query($sql);
     if($res->num_rows > 0) {
       while($i = $res->fetch_assoc()) {
         if($i['passwort'] == hash("sha512", $_POST['passwort'])){
           $_SESSION["id"] = $i['id'];
           echo "TEST";
           header("Location: schaumparty/meinProfil.php");
         }
       }
     }
   }
 
?><!DOCTYPE html>
<html lang="de">
  <head>
    <title>Autofill</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/main.min.css">
  </head>
  <body>
    <header>
      <h1>Autofill</h1>
    </header>
    <nav>
      <ul><a href="/index.php">
          <li>Was ist Autofill ?</li></a><a href="/register.php">
          <li>Registrieren</li></a><a href="/login.php">
          <li>Anmelden</li></a><a href="/about.php">
          <li>Über</li></a></ul>
      <div class="handle">Menü</div>
    </nav>
    <section>
      <form id="login" method="POST">
        <h1>Anmeldung</h1>
        <input type="email" name="email" placeholder="E-mail"><br>
        <input type="password" name="passwort" placeholder="Passwort"><br>
        <input type="submit" name="login_submit" value="Anmelden" class="button">
      </form>
    </section>
    <footer>
      <nav><a href="#">&copy; Papa Jonas</a><a>|</a><a href="#">Impressum</a></nav>
    </footer>
  </body>
  <script src="/assets/js/jquery-2.1.4.min.js"></script>
  <script src="/assets/js/functions.js" type="text/javascript"></script>
</html>