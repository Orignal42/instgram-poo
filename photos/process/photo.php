<?php
include '..//../partials/header.php';

include '..//../management/autoload.php';

require_once("..//../management/pdo.php");


$photo= new Photosmanager($pdo);
$user= new Usersmanager($pdo);
if (isset($_POST['comments'])){
    
   
    $newphoto = new Photos(['photo'=>$_FILES["photo"]["name"],'id_user'=>$_SESSION['id'], 'comments'=>$_POST['comments']]);
     $user= new Users(['id'=>$_SESSION['id']]);
    $photo-> addPhoto($newphoto,$user);


// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("images/" . $_FILES["photo"]["name"])){
                echo $_FILES["photo"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/" . $_FILES["photo"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
}


?>
<div class="container phto">
<form method="post" action="photo.php"  enctype="multipart/form-data">


    <div class="input-field col s8"id="phtos">
     Commentaire:<br><textarea id="commentaire" class="materialize-textarea" name="comments" data-length="255"></textarea>
                <label for="commentaire"></label>
     </div>
                     
        
            <label for="avatar"><br>Photo:</label>

        <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
     <br>
        <div class="input-field col s2">
        <button id="sendButton" type="submit" class="btn btn-light">Partager l'image</button>

            </div>   
        
        </div>  
        
</form>









<?php include '..//../partials/footer.php' ?>