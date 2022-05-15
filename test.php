<?php session_start() ?>
<html>
    <head>
        <title> test </title>
    </head>

    <body>
        
    
        <br> <br>

        <!--  
            Session pour les id des trajet pour l'etudiant 

            pour le trajetv :
            DESTINATION / DEPART
            Prix / moyen de transport (nombre dans le vehicule)
            heure / nombre de place (en direct)
            Rejoindre // quitter


            Tout a droite mettre un bouton rejoindre // si deja dedans pouvoir quitter

            Recup les trajet sur la bdd

         -->



        <h3>Vos reservation</h3>
        <

        <br><br><br><br><br><br>
        <h4>Creation de la voiture</h4>
    <form action="test.php" method="POST">

        <input type="text" name="type" id="type" placeholder="type de véhicule">
        <input type="text" name="nb_place" id="nb_place" placeholder="Nombre de place du véhicule">
        <input type="text" name="immatriculation" id="immatriculation" placeholder="immatriculation">
        <input type="text" name="place_dispo" id="p_dispo" placeholder="place disponible">
        <input type="text" name="assurance" id="assurance" placeholder="assurance">
        <input type="text" name="permis" id="permis" placeholder="permis">
        <input type="text" name="carte_grise" id="carte_grise" placeholder="carte grise">
        <input type="text" name="points" id="points" placeholder="point sur le permis">
        <input type="text" name="ct" id="ct" placeholder="contrôle technique">
        <input type="submit" value="Valide" id="fromsend" name="fromsend">
        

    </form>
    
    </body>

    <?php 
            if(isset($_POST['fromsend'])) {

                extract($_POST);
                
                //if(!empty($vehicule)){

                    include 'dbacces.php';
                    global $db;

                    $q = $db -> prepare("INSERT INTO vehicule(type,immatriculation,carte_grise,nb_place,ct,assurance,permis,points,id_v)
                                        VALUES(:type,:immatriculation,:carte_grise,:nb_place,:ct,:assurance,:permis,:points,:id_v)");
                    $q->execute([
                        'type' => $type,
                        'immatriculation' => $immatriculation,
                        'carte_grise' => $carte_grise,
                        'nb_place' => $nb_place,
                        'ct' => $ct,
                        'assurance' => $assurance,
                        'permis' => $permis,
                        'points' => $points,
                        'id_v' => NULL,   
                    ]);
                    
                    
                }    

                    ?>
                        

                    <!-- etudiant -->
                    <h4>création des menu étudiant</h4>
                    <form action="test.php" method="post">
                    <input type="text" name="ville" id="Ville" placeholder="Ville">
                    <input type="text" name="prenom" id="prenom" placeholder="Prénom">
                    <input type="text" name="nom" id="nom" placeholder="Nom">
                    <!--<input type="text" name="rasemblement" id="rassemblement" placeholder="rassemblement"> -->
                    <input type="text" name="adresse" id="adresse" placeholder="adresse">
                    <input type="text" name="username" id="username" placeholder="pseudo">
                    <input type="password" name="password" id="password" placeholder="Mot de passe">
                    <input type="password" name="cpassword" id="cpassword" placeholder="Confirmez votre mot de passe">
                    <input type="email" name="email" id="email" placeholder="email">
                    <!--<input type="text" name="duree" id="duree" placeholder="durée">
                    <input type="text" name="l_t" id="l_t" placeholder="loisir/travail"> -->
                    <input type="submit" name="fromsend1" value="fromsend1">
                    </form>
                    <?php
                    if(isset($_POST['fromsend1'])) {

                        extract($_POST);
                        
                        //if(!empty($vehicule)){
        
                            include 'dbacces.php';
                            global $db;
        

                    
                    $q2 = $db -> prepare("INSERT INTO etudiant(ville,prenom,nom,adresse,username,password,email,id_e) 
                                        VALUES(:ville,:prenom,:nom,:adresse,:username,:password,:email,:id_e)");
                    $q2 ->execute([
                        'ville' => $ville,
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'adresse' => $adresse,
                        'username' => $username,
                        'password' => $password,
                        'email' => $email,
                        'id_e' => NULL,
                    ]);
                    }

                ?>

                <h4>lieu</h4>
                <form action="test.php" method="post">
                    <input type="text" name="adresse" id="adresse" placeholder="adresse">
                    <input type="text" name="type_lieu" id="type_lieu" placeholder="type de lieu">
                    <input type="text" name="moyen_de_transport" id="moyen_de_transport" placeholder="moyen de transport">
                    <input type="text" name="duree" id="duree" placeholder="durée de trajet">
                    <input type="submit" name="fromsend2" id="fromsend2" value="validé">
                </form>
                <?php
                    if(isset($_POST['fromsend2'])) {

                        extract($_POST);

                   

                        include 'dbacces.php';
                        global $db;



                            $q3 = $db -> prepare("INSERT INTO lieu(id_l, adresse, type_lieu, moyen_de_transport,duree)
                                                 VALUES (:id_l,:adresse,:type_lieu,:moyen_de_transport,:duree)");
                            $q3 ->execute([
                            
                                'id_l' => NULL,
                                'adresse' => $adresse,
                                'type_lieu' => $type_lieu,
                                'moyen_de_transport' => $moyen_de_transport,
                                'duree' => $duree,
                            
                            ]);
                    }

                    ?>
                         
                

                    <h4>lieu modification</h4>
                    <form action="test.php" method="post">
                    <input type="text" name="adresse" id="adresse" placeholder="adresse">
                    <input type="text" name="type_lieu" id="type_lieu" placeholder="type de lieu">
                    <input type="text" name="moyen_de_transport" id="moyen_de_transport" placeholder="moyen de transport">
                    <input type="text" name="duree" id="duree" placeholder="durée de trajet">
                    <input type="submit" name="fromsend3" id="fromsend3" value="validé">
                </form>
                    <!--
                    if(isset($_POST['fromsend3'])) {

                        extract($_POST);

                   

                        include 'dbacces.php';
                        global $db;



                            $q = $db -> prepare("UPDATE `lieu` SET `id_l`=[value-1],`adresse`=[value-2],`type_lieu`=[value-3],
                            `moyen_de_transport`=[value-4],`duree`=[value-5] WHERE 1)");
                            $q ->execute([
                                'id_l' => NULL,
                                'adresse' => $adresse,
                                'type_lieu' => $type_lieu,
                                'moyen_de_transport' => $moyen_de_transport,
                                'duree' => $duree,
                            
                            ]);
                    }
                    ?> -->



            


        




</html>