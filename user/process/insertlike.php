<?php
 include __DIR__ . '/../../management/autoload.php';
 session_start();
 require_once("../../management/pdo.php");
 


// $PhotosManager = new PhotosManager($pdo);
// $userManager = new UsersManager($pdo);
// $likerManager= new Likersmanager($pdo);
// $id=($_SESSION['user'])->getId(); 
// var_dump($id); 
// var_dump($_POST['idphoto']);

// $newliker= new Likers (['id_user'->$id, 'id_photo'->$_POST['idphoto']]);

// $likerManager->addLikers($newphoto,$newuser);


echo $_POST['iduser'];


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
      header('Location: /Instageek/index.php');
        
        $deleteLikeStatement = $pdo->prepare('DELETE FROM likers WHERE id_photo = ? AND id_user = ? ');
        $deleteLikeStatement->execute([
            $_POST['idphoto'],
            $_POST['iduser'],
            header('Location: /Instageek/index.php')
        ]);
     }else{

        $likeStatement = $pdo->prepare('INSERT INTO likers (id_photo, id_user) VALUE (?,?)');
        $likeStatement->execute([
            $_POST['idphoto'],
            $_POST['iduser']
        ]);
        echo "like Ajouté";
        header('Location: /Instageek/index.php');
     }

}
