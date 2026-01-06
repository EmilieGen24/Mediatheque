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

    <!-- Faire une page d’inscription pour les utilisateurs avec un mot de passe a rentré qui sera crypté
en base de donné (métode ARGON)
 -->
<h2>S'INSCRIRE</h2>
    <p>
        <form action="inscription.php" method="$_POST">
            <label for="nom">Votre nom : </label>
            <input type="text" name="nom" id="nom">
            <label for="prenom">Votre prénom : </label>
            <input type="text" name="prenom" id="prenom">
            <label for="mail">Votre mail : </label>
            <input type="text" name="mail" id="mail">
            <label id="password">Votre mot de passe : </label>
            <input type="password" name="password" id="password">
            <button>Valider</button>
        </form>

    </p>
        <?php 
        $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");

        // Cryptage du mot de passe
        if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["password"])){
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $mail = $_POST["mail"];
            $password = $_POST["password"];
            $entryUser = htmlspecialchars($_POST["nom"]);
            $entryPassword = htmlspecialchars($_POST["password"]);
            $passwordArgon = password_hash($password,PASSWORD_ARGON2I);

            $requestInsert = $bdd->prepare("INSERT INTO user(nom,prenom,mail,password)
                                        VALUES (?,?,?,?)");
            $data = $requestInsert->execute (array($nom,$prenom,$mail,$password));

        // verification du nom d'utilisateur et du mot de passe
            if(($entryUser == $user) && (password_verify($entryPassword,$passwordArgon))){
                header("location:index.php");
                echo "Bonjour " . $prenom . "votre inscription est validé";
            }else{
                echo "Les données sont incorrectes";
            }
        }
        ?>

</body>
</html>