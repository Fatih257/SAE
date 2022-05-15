  <html>
    <head>

        <meta charset="UTF-8" />
        <link rel="stylesheet" href="sae23.css">
        <title>
            PhpMyAdmin
        </title>


    </head>

    <body>
      <div class="banner2">
      <ul class="navigation">
      <li><a href="index.php">Accueil</a></li>
      <li><a href="page1.php">Connexion ou Inscription</a></li>
      </ul>
      <br>
      <h3 class="oui"><i><b> Connecter vous ci dessous, si vous n'avez pas de compte, veuillez vous inscrire.  </b></i></h3>
      <div id="container">


          <form class="" method="post">
          <h2>Connexion</h2>
          <input type="text" name="username" id="username" placeholder="Pseudo">
          <input type="password" name="password" id="password" placeholder="Mot de Passe">
          <input type="submit" name="fromlogin" id="fromlogin" value="Connexion" >
      </div>

      <div id="container2">

        <form class="form2" method="post">
          <h2>Inscription</h2>
          <input type="text" name="username" id="username" placeholder="Pseudo">
          <input type="password" name="password" id="password" placeholder="Mot de Passe">
          <input type="password" name="cpassword" id="cpassword" placeholder="Confirmer votre Mot de Passe">
          <input type="email" name="email" id="email" placeholder="Email">
          <input type="submit" name="fromsend" id="fromsend" value="Incription">

       </div>

    <?php
    include 'dbacces.php';
    global $db;


    if(isset($_POST['fromlogin'])) {

        extract($_POST);

        if(!empty($username) && !empty($password)) {

            $q = $db->prepare("SELECT * FROM users WHERE username = :username");
            $q->execute(['username' => $username]);
            $result = $q->fetch();
            if($result){

                if(password_verify($password, $result['password'])){

                    $_SESSION['username']=$username;
                    $_SESSION['email']=$result['email'];
                    //Pour mettre la date au format FR
                    
                    $date = date_create_from_format('Y-m-d H:i:s', $result['date']);
                    $date = date_format($date, 'd/m/Y à H:i:s');
                    $_SESSION['date']= $date;


                    echo "Mot de Passe bon !";?>
                    <meta http-equiv="refresh" content="0;url=index.php">


                <?php } else{
                    echo "Vérifiez vos information";
                }

            } else{
                echo "Le compte " . $username . " n'existe pas";
            }

        }
    }
    ?>

    <?php

    if(isset($_POST['fromsend'])) {

        extract($_POST);

        if(!empty($username) && !empty($email) && !empty($password) && !empty($cpassword)) {

        if ($password == $cpassword) {

                $options = [
                    'cost' => 12,
                    ];

            $hashpass = password_hash($password, PASSWORD_BCRYPT, $options);

            include 'dbacces.php';
            global $db;

            $q = $db -> prepare("INSERT INTO users(username,email,password) VALUES(:username,:email,:password)");
            $q->execute([
                'username' => $username,
                'email' => $email,
                'password' => $hashpass,
                ]);

            echo "Bienvenue, " . $username ;

            }
            else{
                echo "error, les mots de passe sont differents";
            }
        }   else{
                echo "error, veuillez remplir les champs";
            }
    }
    ?>
    </div>
    </body>

</html>
