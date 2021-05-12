<?php
require_once(__DIR__ . "/management/autoload.php");
include './partials/header.php';
require_once(__DIR__ . "/management/pdo.php");
$idphoto=$_SESSION['user']->getId();

if ($_SESSION['user']) {
    $userManager = new UsersManager($pdo);
    $allusers = $userManager->getList();
    $test = new PhotosManager($pdo);
    $arrayPhotos = $test->getListPhotosByUsers($_SESSION['user']);


 

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


                <?php 
                 foreach ($arrayPhotos as $rowPhotos){
               
                   ?> 

                <img src="/Instageek/photos/images/<?php echo $rowPhotos->getPhoto(); ?>"width='30%' height='auto'>
                <?php }?>        
            </div>
    </div>


    <?php include './partials/footer.php' ?>