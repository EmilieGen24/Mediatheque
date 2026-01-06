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
    
    <p>
        <?php
        $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");

    // afficher sur la page d’accueil les 2 noms et prénoms
        $requestRead = $bdd->query ("SELECT prenom, nom FROM user");
            while ($data = $requestRead -> fetch()){
                // afficher les noms et prénoms
                // echo "<p>" . $data["prenom"] . "  " . $data["nom"] . "</p>";
            }
        ?>
    </p>

    <!-- Afficher les 3 derniers films sur page accueil et retirer les utilisateurs -->
    <?php
    $requestRead = $bdd->prepare ("SELECT titre, realisateur, genre, duree FROM film LIMIT 3");
    $requestRead->execute(array());
            while ($data = $requestRead -> fetch()){
                echo  $data["titre"] . " <br> " . "Réalisé par : " . $data["realisateur"] . " <br> " . $data["genre"] . " <br> " . $data["duree"] . " min" . " <br> ";
            }
            
    ?>
    <a href="film.php">Voir plus</a>
</section> 
<section>
     <!-- Inserer un boutton qui amène sur une autre page -->
    <button><a href="film.php">Ajouter une fiche de film</a></button>
</section>
   

    

    
   
    
</body>
</html>