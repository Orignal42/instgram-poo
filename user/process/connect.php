<?php include '../../partials/header.php' ;

include '../../management/autoload.php';

require_once("../../management/pdo.php");
$userManager= new Usersmanager($pdo);

if (isset($_POST['user'])){

 
    $newuser = new Users(['user'=>$_POST['user']]);

    $userManager->connect($newuser);
// La on transforme le newuser en tableau pour ressortir les infos plus tard
    $_SESSION['user']= $newuser;
    header('Location: /Instageek/bibliotheque.php');
}
?>






<form method="post" action="/Instageek/user/process/connect.php"  enctype="multipart/form-data">
<div class="container">
<div class="row">
    <div class="connect">
    Pseudo:<input id="user" type="text" name="user" data-length="10"><br>
            
    <button id="sendButton" type="submit" class="btn btn-light">Connection</button>
    </div>
 </div>
</div>
</form>
<?php include '../../partials/footer.php' ?>