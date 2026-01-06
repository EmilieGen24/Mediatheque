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
    <p>
        <?php
        $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");

        $requestRead = $bdd->query ("SELECT prenom, nom FROM user");
            while ($data = $requestRead -> fetch()){
                // afficher les noms et prénoms
                // echo "<p>" . $data["prenom"] . "  " . $data["nom"] . "</p>";
            }
        ?>
    </p>
    <h2>SE CONNECTER</h2>
    <!-- Créer un formulaire nom et prénom -->
    <p>
         <form action="connexion.php" method="$_POST">
            <label for="nom">Votre nom : </label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Votre prénom : </label>
            <input type="text" name="prenom" id="prenom">
    <!-- Rajouter un mot de passe pour les utilisateurs -->
            <label id="password">Votre mot de passe : </label>
            <input type="password" name="password" id="password">
            <button>Valider</button>
        </form>

        <?php
         if(isset($_POST["nom"])&& isset($_POST["prenom"])){
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $password = $_POST["password"];

            $request = $bdd->prepare("SELECT nom,prenom,password FROM user");
            $data = $request->execute (array($prenom,$nom,$password));
            while($data=$request->fetch()){
                if($data["nom"] == $nom && $data["prenom"] == $prenom && password_verify ($password,$data["password"])){
                header("location:index.php");
                echo "Bonjour " . $prenom;
                }else{
                echo "Le mot de passe ou le nom d'utilisateur est incorrect";
                }
            }
        }
        ?>
    </p>
</section>  
</body>
</html>