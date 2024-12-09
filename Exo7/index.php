
<?php
require_once './utils/connect_db.php';

$sql = "SELECT lastName, firstName, birthDate, card, cardNumber
FROM clients";

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
            <ul>Le nom du client : <?= $user['lastName']  ?> </ul>
            <ul>Le prénom du client : <?= $user['firstName']  ?> </ul>
            <ul>La date de naissance du client : <?= $user['birthDate']  ?> </ul>
            <ul>Si le client a une carte de fidélité : <?php if($user['card'] > 0){
                echo "oui";
            } else {
                echo "non";
            } ?> </ul>
            <ul>Numéro de la carte de fidélité  : <?php if($user['card'] > 0){
                echo $user["cardNumber"];
            } else {
                echo "Ne possède pas de carte de fidélité";
            }  ?> </ul>
            <br>

        <?php
        }

        ?>

    </ol>

</body>

</html>
