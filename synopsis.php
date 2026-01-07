<?php
    $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");

    // Lien voir plus
    $requestRead = $bdd->prepare (" SELECT id, titre, realisateur, genre, duree, synopsis 
                                    FROM film
                                    WHERE id= :id");
    $requestRead->execute(["id"=> $_GET["id"]]);         
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

    <h2>VOTRE SELECTION</h2>

    <?php
        while ($data = $requestRead -> fetch()):
    ?>
            <div class="card">
                <div class="card-content">
                <h3><?=$data["titre"]?></h3>
                <p>Réalisé par : <?=$data["realisateur"] ?></p>
                <p>Genre : <?=$data["genre"] ?></p>
                <p>Durée : <?=$data["duree"] . " min" ?></p>
                <p>Synopsis : <?=$data["synopsis"] ?></p>
                </div>
            </div>
    <?php            
        endwhile;  
    ?>

    
</body>
</html>