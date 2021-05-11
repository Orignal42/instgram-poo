<?php 
session_start();
    require_once(__DIR__."/../../pdo.php");
$likedPhotos = $pdo->prepare('SELECT * FROM likers WHERE likers.id_user = ?');
$likedPhotos->execute([
    $_SESSION['id']
]);

$AllPhotoLiked = $likedPhotos->fetchAll(PDO::FETCH_ASSOC);
//var_dump($AllPhotoLiked);