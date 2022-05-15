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
      </ul>
      <h1><i><b> CaR&T </b></i></h1>

        <form method="get" action="index.php">
          <div class="test">

          <label for="name"> destination: </label>
          <select name="projet" id="projet" style="padding: 1px 20px;
">
          <!--?php
              include "dbacces.php";
              global $db;
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                      $repere= $row["adresse"]; ?>
                      
                    <option value="projet"> < ?php echo  htmlentities($repere, ENT_HTML5,'UTF-8')  ?></option>
               < ?php
                    }    
                }
                    else {  echo "0 results";
                }
          ?--> 
        
       
      
             </select>
          <!--<input type="select" name="D" minlength="1"; maxlength="100" size="1";required>
            <option value="test">test</option> -->
          <br> <br>

          <label for="name"> depart: </label>
          <input type="text" name="depart" maxlength="100" minlength="1" size="1";required>
          <br> <br>
          
          <!--
          <label for="name"> prix : </label>
          <input type="number" name="N" min="1"; max="100000" ;required>
          <br> <br>
          -->
          
          <label for="name"> moyen de transport: </label>
          <input type="text" name="char" maxlength="100" minlength="1" size="1";required>
          <br> <br>

          <!--
          <label for = "name"> heure : </label>
          <input type="text" name="char" maxlength="100" minlength="1" size="1";required>
          </div>
          <br> <br> <br>
          -->
          
          <input type="submit" value="Rejoindre" id="rejoindre">
          <br>

          <input type="submit" value="Quitter" id="quitter" >
          <br>
        </form>


        </div>



        <?php

        ?>


    </body>

</html>
