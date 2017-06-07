
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
<!DOCTYPE html>
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
      <h1>Anmeldung</h1>
      <div id="register_wrapper">
        <form id="register" method="POST" action="">
          <p>Felder die mit einem <span>*</span> gekennzeichnet sind, sind <span>Pflichtfelder</span>!</p><br>
          <input type="name" name="name" placeholder="Dein Name"><br>
          <input type="name" name="ingame_name" placeholder="Dein Beschwörername"><span>*</span><br>
          <input type="email" name="email" placeholder="Deine E-mail"><span>*</span><br>
          <input type="password" name="passwort" placeholder="Dein Passwort"><span>*</span><br>
          <label>Dein Rang: 
            <select name="liga">
              <option>Unranked</option>
              <option>Bronze</option>
              <option>Silver</option>
              <option>Gold</option>
              <option>Platin</option>
              <option>Diamond</option>
              <option>Master</option>
              <option>Challenger</option>
            </select>
            <select id="division" name="division">
              <option>Division</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select><span>*</span>
          </label><br>
          <input type="number" name="user_alter" placeholder="Dein Alter"><br>
          <input type="submit" name="register_submit" value="Registrieren">
        </form>
      </div>
    </section>
    <footer>
      <nav><a href="#">&copy; Papa Jonas</a><a>|</a><a href="#">Impressum</a></nav>
    </footer>
  </body>
  <script src="/assets/js/jquery-2.1.4.min.js"></script>
  <script src="/assets/js/functions.js" type="text/javascript"></script>
</html>