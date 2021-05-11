<?php include '../../partials/header.php' ;

include '../../management/autoload.php';

require_once("../../management/pdo.php");
$user= new Usersmanager($pdo);

if (isset($_POST['user'])){
    $_SESSION['user']=$_POST['user'];
    
    $newuser = new Users(['user'=>$_POST['user']]);
    header('Location: /Instageek/bibliotheque.php');
    $user->connect($newuser);
    
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