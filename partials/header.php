<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instageeks </title>
    <!-- CSS only -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="/Instageek/css/custom.css" rel="stylesheet">

<?php if(isset($_GET["message"])) : ?>
   <div style="padding:10px;background:green;color:#fff;">
   <?=    $_GET["message"]?>
   </div>          
     <?php endif ;?>    

</head>
<body>


<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Instageeks</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Instageek/index.php">Accueil <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Instageek/bibliotheque.php">Imagothèque <span class="sr-only"></span></a>
      </li>

      <?php if($_SESSION){?>

        <li class="nav-item">
          <a class="nav-link" href="/Instageek/profil.php">Profile</a>
        </li>
        <li class="nav-item">
          
          <a class="nav-link" href="/Instageek/user/process/endsession.php">Déconnection</a>
        </li>
       
      <?php }else{ ?>
        <li class="nav-item active">
          <a class="nav-link" href="/Instageek/user/process/connect.php">Connection <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Instageek/user/process/create_user.php">Inscription</a>
        </li>
      <?php } ?>

    </ul>
      </div>
      </div>
</nav>

