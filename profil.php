<?php

include './partials/header.php';
require_once(__DIR__."/management/pdo.php");
require_once(__DIR__."/management/autoload.php");
$user= new Usersmanager($pdo);
echo $_SESSION['user'];
if ($_SESSION['user']){
    $user = new UsersManager($pdo);
    $allusers = $user->getList();
}
?>


<div class="container justify-content-center">
  
    <div class=bibli>
<h1>Profile </h1> 
<div class="container">   
    <?php  foreach ($allusers as $rowuser){ ?><br>
     <h1> <?=$rowuser->getUser();}?></h1>
   <div class="avatar">
   <?php  foreach ($allusers as $rowuser){ ?><br>
     <img src="/Instageek/user/avatar/<?=$rowuser->getAvatar();}?>">
   


<?php include './partials/footer.php' ?>