<?php
    $bdd = new PDO ("mysql:host=localhost;dbname=mediatheque;charset=utf8","root","");
    
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

<!-- Rajouter un bouton supprimer et modifier -->

    <?php
        
        if(isset($_POST['delete'])) {
            $delete = $_POST["delete"];

            $requestDelete = $bdd-> prepare("   DELETE FROM film 
                                                WHERE id = :id");
            $requestDelete -> execute(["id" => $data["id"]]);

                header("location:film.php");
        }

    ?>
    
</body>
</html>