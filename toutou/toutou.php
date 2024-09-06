<?php
$pdo = new PDO('mysql:host=localhost;dbname=chien', 'root', '');

$request = $pdo->prepare('SELECT * FROM produits WHERE category = "nourriture"');

try {
    $request->execute();

    $tab = $request->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>nourritures</title>

</head>

<body>

    <main>

        <div class="container">

            <h2>Nourritures</h2>

            <div class="bloc-nourriture">
                <?php if (!empty($tab)) {
                    foreach ($tab as $t) { ?>
                        <div>
                            <div>
                                <img src="./assets/img/<?= $t['image']; ?>" alt="<?= $t['name']; ?>">
                            </div>
                            <h3><?= $t['name'] ?></h3>
                        </div>
                    <?php }
                } else { ?>
                    <h2 style="height : 300px;">Aucun produit disponible pour le moment...</h2>
                <?php } ?>
            </div>

        </div>


    </main>

</body>

</html>