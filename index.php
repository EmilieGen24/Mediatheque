<?php
    $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");

    // afficher sur la page d’accueil les 2 noms et prénoms
    $requestRead = $bdd->query ("   SELECT prenom, nom 
                                    FROM user");
        while ($data = $requestRead -> fetch()){
        }
    $requestReadLimit = $bdd->prepare ("    SELECT id, titre, realisateur, genre, duree 
                                            FROM film LIMIT 3");
    $requestReadLimit->execute([]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD mediatheque</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <!-- FONCTION INCLUDE POUR RECUPERER LA NAVBAR -->
    <?php include('nav.php') ?>

<section>  
    <h1> LES FILMS A L'AFFICHE</h1>

    <!-- Afficher les 3 derniers films sur page accueil et retirer les utilisateurs -->
    <?php
        
        while ($data = $requestReadLimit -> fetch()):
    ?>
            <div class="card">
                <div class="card-content">
                <h3><?=$data["titre"]?></h3>
                <p>Réalisé par : <?=$data["realisateur"] ?></p>
                <p>Genre : <?=$data["genre"] ?></p>
                <p>Durée : <?=$data["duree"] . " min" ?></p>
                <a href="synopsis.php?id=<?=$data["id"] ?>">Voir plus</a>
                </div>
            </div>
    <?php            
            endwhile;  
    ?>
    
</section> 
<section>
     <!-- Inserer un boutton qui amène sur une autre page -->
    <button><a href="film.php">Ajouter une fiche de film</a></button>
</section>
    
</body>
</html>