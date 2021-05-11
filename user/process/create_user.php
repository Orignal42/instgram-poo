<?php include '../../partials/header.php' ;

include '../../management/autoload.php';

require_once("../../management/pdo.php");


$user= new Usersmanager($pdo);
if(isset($_POST['user'])){
    $newuser = new Users(['user'=>$_POST['user'], 'avatar'=>$_FILES["avatar"]["name"], 'description'=>$_POST['description']]);
      $user->addUser($newuser);
}

// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Vérifie si le fichier a été uploadé sans erreur.
    if(isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["avatar"]["name"];
        $filetype = $_FILES["avatar"]["type"];
        $filesize = $_FILES["avatar"]["size"];

        // Vérifie l'extension du fichier
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

        // Vérifie la taille du fichier - 5Mo maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

        // Vérifie le type MIME du fichier
        if(in_array($filetype, $allowed)){
            // Vérifie si le fichier existe avant de le télécharger.
            if(file_exists("avatar/" . $_FILES["avatar"]["name"])){
                echo $_FILES["avatar"]["name"] . " existe déjà.";
            } else{
                move_uploaded_file($_FILES["avatar"]["tmp_name"], "../avatar/" . $_FILES["avatar"]["name"]);
                echo "Votre fichier a été téléchargé avec succès.";
            } 
        } else{
            echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
        }
    } else{
        echo "Error: " . $_FILES["avatar"]["error"];
    }
}



?>


<section>
<div class="container">
<div class="create">
        <div class="row">
<form method="post" action="create_user.php"  enctype="multipart/form-data">
   
  
            <div class="input-field col s2">
                <input id="user" type="text" name="user" data-length="10">
                <label for="user">Pseudo</label>
            </div>

            <div class="input-field col s8">
                <textarea id="description" class="materialize-textarea" name="description" data-length="120"></textarea>
                <label for="description">Bio</label>
            </div>
         
        
            <label for="avatar">Avatar:</label>

        <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
        
        
        </div>  

        <div class="input-field col s2">
                <button id="sendButton" type="submit" class="btn btn-light">Creation nouvel utilisateur</button>
            </div>
            </div>

</form>
</div>
</section>



<?php include '../../partials/footer.php' ?>