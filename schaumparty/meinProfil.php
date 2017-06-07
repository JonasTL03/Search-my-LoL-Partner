
<?php 
session_start();
if($_SESSION['id'] == "") {
  header("Location: /login.php");
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
      <ul><a href="/schaumparty/meinProfil.php">
          <li>Mein Profil</li></a><a href="/schaumparty/suche.php">
          <li>Registrieren</li></a><a href="/login.php">
          <li>Anmelden</li></a><a href="/about.html">
          <li>Über</li></a></ul>
      <div class="handle">Menü</div>
    </nav>
    <section>
    </section>
    <footer>
      <nav><a href="#">&copy; Papa Jonas</a><a>|</a><a href="#">Impressum</a></nav>
    </footer>
  </body>
  <script src="/assets/js/jquery-2.1.4.min.js"></script>
  <script src="/assets/js/functions.js" type="text/javascript"></script>
</html>