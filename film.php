<?php
    $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");
    $requestRead = $bdd->prepare (" SELECT id, titre, realisateur, genre, duree 
                                    FROM film");
    $requestRead->execute([]);

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

    <h2>CREER UNE NOUVELLE FICHE FILM</h2>
    <!-- Créer un fomrulaire pour fiche film -->
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
    <?php
        
        if(isset($_POST["titre"], $_POST["real"], $_POST["genre"], $_POST["time"], $_POST["synopsis"])) {
            $titre = $_POST["titre"];
            $real = $_POST["real"];
            $genre = $_POST["genre"];
            $time = $_POST["time"];
            $synopsis = $_POST["synopsis"];

            $requestInsert = $bdd->prepare("    INSERT INTO film(titre, realisateur, genre, duree, synopsis)
                                                VALUES (?,?,?,?,?)");
            $data = $requestInsert->execute (array($titre,$real,$genre,$time,$synopsis));
        }
    ?>

    <!--Option rajouter une image -->
    <form id="upload" action="film.php#upload" method='POST' enctype='multipart/form-data'>
        <input type="file" name="upload">
        <button>Télécharger</button>
    </form>
    <?php
        if(isset($_FILES['upload'])){
            $imageName = $_FILES['upload']['name'];
            $imageInfo = pathinfo($imageName);
            $imageExt = $imageInfo['extension'];
            // extensions autorisées
            $autorizedExt = ['png','jpeg','jpg','webp','bmp','svg'];

            // Verifier l'extention du fichier
            if(in_array($imageExt,$autorizedExt)){
                $uniqueName = time() . rand(1,1000) . "." . $imageExt;
                move_uploaded_file($_FILES['upload']['tmp_name'],"assets/img/".$uniqueName);
            
            }else{
                echo "<p>Veuillez choisir un format de fichier valide(png,jpg,webp,bmp,svg)</p>";
            }
        }

        // Affichage de l'image après l'upload
        if(isset($uniqueName)){
            echo "<img src='assets/img/" . $uniqueName . "' alt=''>";
        }
     
    ?>

    <h2>NOS FICHES FILMS</h2>
    <!-- Afficher l’intégralité des films -->
    
    <?php
        while ($data = $requestRead -> fetch()):
    ?>
            <div class="card">
                <div class="card-content">
                <h3><?=$data["titre"]?></h3>
                <p>Réalisé par : <?=$data["realisateur"] ?></p>
                <p>Genre : <?=$data["genre"] ?></p>
                <p>Durée : <?=$data["duree"] . " min" ?></p>
                <a class="synopsis" href="synopsis.php?id=<?=$data["id"] ?>">Voir plus</a>
                <a class="modif" href="update.php?id=<?=$data["id"] ?>">modifier</a>
                <a class="delete" href="delete.php?id=<?=$data["id"] ?>">supprimer</a>
                </div>
            </div>
    <?php            
            endwhile;  
    ?>

    
</body>
</html>