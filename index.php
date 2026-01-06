<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>TD PHP SQL</h1>
    <h2>Afficher le nom et prénom</h2>
    <p>
        <?php
        $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");

        $requestRead = $bdd->query ("SELECT prenom, nom FROM user");
            while ($data = $requestRead -> fetch()){
                echo "<p>" . $data["prenom"] . "  " . $data["nom"] . "</p>";
            }
        ?>
    </p>
    <h2>Formulaire</h2>
    <p>
         <form action="index.php" method="$_POST">
            <label for="nom">Votre nom : </label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Votre prénom : </label>
            <input type="text" name="prenom" id="prenom">
            <button>Valider</button>
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
    
    <button><a href="film.php">Ajouter une fiche de film</a></button>

    
</body>
</html>