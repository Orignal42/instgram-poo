<?php
require_once(__DIR__ . "/management/autoload.php");
include './partials/header.php';
require_once(__DIR__ . "/management/pdo.php");


if ($_SESSION['user']) {
    $userManager = new UsersManager($pdo);
    $allusers = $userManager->getList();
    $test = new PhotosManager($pdo);
    $arrayPhotos = $test->getListPhotosByUsers($_SESSION['user']);
    foreach ($arrayPhotos as $photo){ 
      $photographie=$test->getPhotosbyUsers($photo);
        var_dump($photographie);
        }
}

?>
<div class="container justify-content-center">

    <div class=bibli>
        <h1>Profile </h1>
        <div class="container">
        <h1><?=$_SESSION['user']->getUser();?></h1>
        
                <div class="avatar">
                         <img src="/Instageek/user/avatar/<?= $_SESSION['user']->getAvatar(); ?>"width='30%' height='auto'>                             
                </div>

                <h1><?=$_SESSION['user']->getDescription();?></h1>


                <?php foreach ($photographie  as $rowPhotos){?>       
                <img src="/Instageek/photos/images/<?= $rowPhotos->getPhotosByUsers(); ?>"width='30%' height='auto'>
                <?php }?>        
            </div>
    </div>


    <?php include './partials/footer.php' ?>