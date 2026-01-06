<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <button>Créer</button>
        </form>
        <?php
         if(isset($_POST["nom"])&& isset($_POST["prenom"])){
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $requestInsert = $bdd->prepare("INSERT INTO user(prenom,nom)
                                        VALUES (?,?)");
            $data = $requestInsert->execute (array($prenom,$nom));
            }
        ?>
    </p>
</body>
</html>