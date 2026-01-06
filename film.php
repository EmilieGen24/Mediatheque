<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD mediatheque</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <p>
         <form action="film.php" method="$_POST">
            <label for="titre">Titre du film : </label>
            <input type="text" name="titre" id="titre">
            <label for="real">Réalisateur : </label>
            <input type="text" name="real" id="real">
            <label for="genre">Genre : </label>
            <input type="text" name="genre" id="genre">
            <label for="time">Durée : </label>
            <input type="text" name="time" id="time">
            <label for="synopsis">Synopsis : </label>
            <input type="text" name="synopsis" id="synopsis">
            <button>Créer une fiche film</button>
        </form>
    </p>

    <!-- Afficher l’intégralité des films -->
    <p>
        <?php
        $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");
        $requestRead = $bdd->prepare ("SELECT titre, realisateur, genre, duree FROM film");
        $requestRead->execute(array());
            while ($data = $requestRead -> fetch()){
                echo "<p>" . $data["titre"] . "  " . $data["realisateur"] . $data["genre"] . $data["duree"] . "</p>";
            }
        ?>
        
    </p>
</body>
</html>