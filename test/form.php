<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    
    <form action="ajouter_produit.php" method="post" enctype="multipart/form-data">
        <label for="nom">Nom du produit :</label>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="prix">Prix :</label>
        <input type="number" step="0.01" id="prix" name="prix" required><br><br>
        
        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" required>
            <option value="nourriture">Nourriture</option>
            <option value="jouet_accessoire">Jouet/Accessoire</option>
            <option value="entretien">Entretien</option>
        </select><br><br>
        
        <label for="image">Image du produit :</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        
        <button type="submit">Ajouter le produit</button>
    </form>
</body>
</html>
