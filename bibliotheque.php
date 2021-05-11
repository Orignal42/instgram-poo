<?php
include './partials/header.php'; 
require_once(__DIR__."/management/pdo.php");


$selectStatement=  $pdo -> prepare('SELECT * FROM photos  ORDER BY photos.created_at  DESC ');
$selectStatement->execute();
//$selectLikeStatement= $mysqli_query('SELECT SUM(counter)  FROM likers GROUP BY id_photo ');
//$donnees = $selectLikeStatement->mysqli_fetch_array();
//var_dump($donnees['id_photo']);


?>
<?php if($_SESSION){?>
        <div class="bibli">
<form method="post" action="./photos/process/photo.php"  enctype="multipart/form-data">
                
<button> Ajouter une image</button>

</form>
<?php }?>
</div>
        <div class=biblio>
<h1>Imagothèque </h1>
        </div>
        
<div class="container" data-iduser=<?=$_SESSION['id']?>>

<div class="row align-items-center">


    <?php foreach ($selectStatement->fetchAll() as $photo){;?>
        

        
       
        <div class="col-3 ">

         <img src="photos/images/<?php echo $photo['photo'];?>"alt="images"width="80%" height="auto"   /> 
        
       </br> 
                                  
                <div class="break">     
                 <?=$photo['comments']?></br>
                </div>  </br>  
                <button class="launcher-like"  data-idphoto= <?=$photo['id']?> >👍
                </button></br>
 
                 
        </div>
                <?php } ?>
                <?php

?>
 
<div class="col-1"></div>
</div>      
</div>   
  
   

<?php include './partials/footer.php' ?>

  