
<?php
require_once './utils/connect_db.php';

$sql = "SELECT title,performer,date,startTime
FROM `shows`
ORDER BY title";

try {
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ol>
        <h1>Liste des utilisateurs :</h1>

        <?php
        foreach ($users as $user) {
        ?>
            <li>Le nom du spectable et l'artiste : <?= $user['title'] ." " . $user['performer']   ?> | Date et heure : <?= $user['date'] . " " .  $user['startTime']?> </li>

        <?php
        }

        ?>

    </ol>

</body>

</html>
