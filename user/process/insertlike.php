<?php 
 require_once(__DIR__."/../../pdo.php");
session_start();


 if (isset($_POST['idphoto']) && isset($_POST['iduser'])) {
   echo "ppl";
   var_dump($_POST['idphoto']);
    
    $verifLikeStatement = $pdo->prepare('SELECT * FROM likers WHERE id_photo = ? AND id_user = ? ');
    $verifLikeStatement->execute([
         $_POST['idphoto'],
         $_POST['iduser']
    ]);
    $is_like = $verifLikeStatement->fetch(PDO::FETCH_ASSOC);

     if ($is_like) {
      echo "like SUPPRIMER";
        
        $deleteLikeStatement = $pdo->prepare('DELETE FROM likers WHERE id_photo = ? AND id_user = ? ');
        $deleteLikeStatement->execute([
            $_POST['idphoto'],
            $_POST['iduser']
        ]);
     }else{

        $likeStatement = $pdo->prepare('INSERT INTO likers (id_photo, id_user) VALUE (?,?)');
        $likeStatement->execute([
            $_POST['idphoto'],
            $_POST['iduser']
        ]);
        echo "like Ajouté";
     }

}