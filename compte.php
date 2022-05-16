<?php session_start() ?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="/CSS/stylesheet.css">
        <title> index </title>
    </head>

    <body>
      <div class="banner">
      <ul class="navigation">
      <li><a href="index.php">Accueil</a></li>
      <!-- on verifie si une session est ouvert ou non -->
      <?php if(isset($_SESSION)){ ?>
        <li>
          <a href="compte.php">
            Bonjour, <?php echo $_SESSION['username'] ?>
          </a> 
        </li>
      <?php         
      } ?>
      <li><a href="page1.php">Connexion ou Inscription</a></li>
      

      </ul>
      <h1><i><b> CaR&T </b></i></h1>
      <p>
        Votre pseudo : <?php echo $_SESSION['username']; ?> </br>
        Votre e-mail : <?php echo $_SESSION['email']; ?> </br>
       </p>







