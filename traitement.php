<?php 
require_once "includes/db_connect.php";
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit_form'])){

    if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['categorie'])&& $_FILES['image']['size'] > 0){

        $filenames = $_FILES['image']['name'];
        
        $tabFiles = explode('.',$filenames);

        $endofName = strtolower(end($tabFiles));
        
        $dest = '../images/' . $filenames;

        $autorizedTypes = ['jpg','jpeg','png','webp'];

        if(in_array($endofName,$autorizedTypes)){
            if(move_uploaded_file($_FILES['image']['tmp_name'],$dest)){
                $request = $conn->prepare('INSERT INTO produits (name,price,category,image,created_at) VALUES (?,?,?,?,NOW())');
               
                if($request){
                    $request->bind_param('sdss', $_POST['nom'], $_POST['prix'], $_POST['categorie'], $filenames);
                    
                    $request->execute();
                    if($request){
                        header('Location: ../test/form.php');
                    } else {
                        echo 'Erreur dans la requête';
                    }
                } else {
                    echo 'requete bisare';
                }
            } else {
                echo 'wrongh';
            }
        }
    }
}