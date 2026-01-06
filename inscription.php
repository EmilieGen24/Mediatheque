<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TD mediatheque</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Faire une page d’inscription pour les utilisateurs avec un mot de passe a rentré qui sera crypté
en base de donné (métode ARGON)
 -->
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

    // Cryptage du mot de passe
    if(isset($_POST["nom"]) && isset($_POST["password"])){
        $nom = $_POST["nom"];
        $password = $_POST["password"];
        $entryUser = htmlspecialchars($_POST["nom"]);
        $entryPassword = htmlspecialchars($_POST["password"]);
        $passwordArgon = password_hash($password,PASSWORD_ARGON2I);
        
    // verification du nom d'utilisateur et du mot de passe
        if(($entryUser == $user) && (password_verify($entryPassword,$passwordArgon))){
             header("location:index.php");
        }else{
            echo "Le mot de passe ou le nom d'utilisateur est incorrect";
        }
    }
    ?>

</body>
</html>