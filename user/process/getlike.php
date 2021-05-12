<!-- 
// session_start();
//     require_once(__DIR__."/../../pdo.php");
// $likedPhotos = $pdo->prepare('SELECT * FROM likers WHERE likers.id_user = ?');
// $likedPhotos->execute([
//     $_SESSION['id']
// ]);

// $AllPhotoLiked = $likedPhotos->fetchAll(PDO::FETCH_ASSOC);
// var_dump($AllPhotoLiked); -->


<?php 
 require_once(__DIR__ . "/../../pdo.php");

if ($_POST['id']) {
    
    $likedPhotos = $pdo->prepare('SELECT count(*) AS count FROM likers WHERE likers.id_Photo = ?');
    $likedPhotos->execute([
        $_POST['id']
    ]);
        $AllPhotoLiked = $likedPhotos->fetch(PDO::FETCH_ASSOC);
        if ($AllPhotoLiked['nb_like']) {
            echo json_encode($AllPhotoLiked);
        }else{
            echo json_encode(['nb_like'=>0]);
        }
}