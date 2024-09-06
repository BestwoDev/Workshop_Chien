<?php
// Connexion à la base de données
require 'includes/db_connect.php';

// Récupération des produits de la catégorie Jouet/Accessoire
$categorie = 'jouet_accessoire'; 
$sql = "SELECT * FROM products WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $categorie);
$stmt->execute();
$result = $stmt->get_result();

echo "<h1>Jouets et Accessoires</h1>";
while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "' style='width:150px;'><br>";
    echo "<h2>" . $row['name'] . "</h2>";
    echo "<p>Prix : " . $row['price'] . "€</p>";
    echo "</div><br>";
}

$stmt->close();
$conn->close();
?>
