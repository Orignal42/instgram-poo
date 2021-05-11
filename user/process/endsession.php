<?php 
session_start();//Creer la session
session_destroy();
header('Location: /Instageek/index.php?message= vous avez été deconnecté');
?>