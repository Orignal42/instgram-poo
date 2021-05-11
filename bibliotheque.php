<?php
include __DIR__ . '/management/autoload.php';
include './partials/header.php';
require_once(__DIR__ . "/management/pdo.php");
$photoManager = new Photosmanager($pdo);

$ListPhoto = $photoManager->getListPhotos();
//$selectLikeStatement= $mysqli_query('SELECT SUM(counter)  FROM likers GROUP BY id_photo ');
//$donnees = $selectLikeStatement->mysqli_fetch_array();
//var_dump($donnees['id_photo']);
if (empty($_SESSION)) {
    header('Location: /Instageek/index.php');
}
?>


<div class="bibli">
    <form method="post" action="./photos/process/photo.php" enctype="multipart/form-data">
        <button> Ajouter une image</button>
    </form>
</div>
<div class=biblio>
    <h1>Imagothèque </h1>
</div>
<div class="container" data-iduser=<?= $_SESSION['user']->getId() ?>>

    <div class="row align-items-center">
    <?php foreach ($ListPhoto as $photo) { ?>
        <div class="card col-3">          
                <img src="photos/images/<?php echo $photo->getPhoto(); ?>" alt="images" width="80%" height="auto" />
                </br>
                <div class="break">
                    <p><?php echo $photo->getComments() ?></p></br>
                </div></br>
            <button class="launcher-like" data-idphoto=<?= $photo->getId() ?>>👍
            </button></br>
            
        </div>
 
        <div class="col-1"></div>
        <?php } ?>
    </div>
    
</div>


<?php include './partials/footer.php' ?>