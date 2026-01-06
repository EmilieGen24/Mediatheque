<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD mediatheque</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <!-- FONCTION INCLUDE POUR RECUPERER LA NAVBAR -->
    <?php include('nav.php') ?>

    <!-- Afficher les noms et prénoms -->
    <p>
        <?php
        $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");

        $requestRead = $bdd->query ("SELECT prenom, nom FROM user");
            while ($data = $requestRead -> fetch()){
                echo "<p>" . $data["prenom"] . "  " . $data["nom"] . "</p>";
            }
        ?>
    </p>

    <!-- Créer un formulaire nom et prénom -->
    <p>
         <form action="index.php" method="$_POST">
            <label for="nom">Votre nom : </label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Votre prénom : </label>
            <input type="text" name="prenom" id="prenom">

        <!-- Rajouter un mot de passe pour les utilisateurs -->
            <label id="password">Votre mot de passe : </label>
            <input type="password" name="password" id="password">

            <button>Valider</button>
            <a href="inscription.php">Vous inscrire</a>
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

    <!-- Inserer un boutton qui amène sur une autre page -->
    <button><a href="film.php">Ajouter une fiche de film</a></button>

    <!-- Afficher les 3 derniers films sur page accueil et retirer les utilisateurs -->
    
    <?php
    $requestRead = $bdd->prepare ("SELECT titre, realisateur, genre, duree FROM film");
    $requestRead->execute(array());
            while ($data = $requestRead -> fetch()){
                echo "<p>" . $data["titre"] . "  " . $data["realisateur"] . $data["genre"] . $data["duree"] . "</p>";
            }
    ?>

    
   
    
</body>
</html>