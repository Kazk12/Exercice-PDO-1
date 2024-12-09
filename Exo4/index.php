
<?php
require_once './utils/connect_db.php';

$sql = 'SELECT clients.cardNumber, cards.cardNumber, cards.cardTypesId, cardtypes.type, clients.firstName, clients.lastName
FROM clients
INNER JOIN cards ON cards.cardNumber = clients.cardNumber
INNER JOIN cardtypes ON cardtypes.id = cards.cardTypesId
WHERE cardtypes.type LIKE "FIdélité"';

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
            <li>Nom : <?= $user['lastName']   ?> | Prénom : <?= $user['firstName']  ?> </li>

        <?php
        }

        ?>

    </ol>

</body>

</html>
