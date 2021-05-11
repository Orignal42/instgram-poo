<?php
try
{
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=instagram','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}