<?php session_start() ?>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylessheet.css">
        <title> index </title>
    </head>

    <body>
      <div class="banner">
      <ul class="navigation">
      <li><a href="index.php">Accueil</a></li>
      <li><a href="page1.php">Connexion ou Inscription</a></li>
      <?php if($_SESSION['username']){ ?>
        <li>
          <a href="test.php">
            Bonjour, <?php echo $_SESSION['username'] ?>
          </a> 
        </li>
      <?php         
      } ?>

      </ul>
      <h1><i><b> CaR&T </b></i></h1>
        <!-- création du formulaire pour la recherche d'équipage -->
        <form method="get" action="recherche.php">
          <div class="test">

          <label for="name"> destination: </label>
          <!-- recherche des destination dans la bdd -->
          <select name="dst" id="dst" style="padding: 1px 20px;">
          <?php
            include "dbacces.php";
            global $db;
            $reponse = $db -> query('SELECT * FROM lieu');
            while ($donnees = $reponse -> fetch()){
                ?>
                  <option value="<?php echo $donnees['type_lieu']; ?>">
                    <?php echo $donnees['type_lieu']; ?>
                    </option>
          <?php } ?>
  
          </select>

          <br> <br>

          <label for="name"> depart: </label>
          <!-- recherche des depart dans la bdd -->
          <select name="depart" id="depart" style="padding: 1px 20px;">
            <?php
              include "dbacces.php";
              global $db;
              $reponse = $db -> query('SELECT * FROM lieu');
              while ($donnees = $reponse -> fetch()){
                  ?>
                    <option value="<?php echo $donnees['adresse']; ?>">
                      <?php echo $donnees['adresse']; ?>
                      </option>
            <?php } ?>
        
          </select>
          <br> <br>


          
          <label for="name"> moyen de transport: </label>
          <select name="mdt" id="mdt" style="padding: 1px 20px;">
          <!-- recherche des moyen de transport dans la bdd -->
            <?php
              include "dbacces.php";
              global $db;
              $reponse = $db -> query('SELECT * FROM lieu');
              while ($donnees = $reponse -> fetch()){
                  ?>
                    <option value="<?php echo $donnees['moyen_de_transport']; ?>">
                      <?php echo $donnees['moyen_de_transport']; ?>
                      </option>
            <?php } ?>
        
          </select>
          <br> <br>

          <input type="submit" value="Suivant" id="Suivant">
          <br>

        </form>


        </div>



        <?php

        ?>


    </body>

</html>
