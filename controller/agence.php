<!-- Routeur Agence -->
<?php require './frontendController.php'; 

?>

<?php session_start(); $title = 'Agence ' . $_SESSION['login'] . ' - Air Azur'; ?>

<?php require '../view/frontend//navigation.php'; ?>

<?php

if(!isset($_REQUEST['action']))
    $action = 'accueil';
else
    $action = $_REQUEST['action'];


if (isset($_SESSION['login']) && $_SESSION['uStatus'] == 'agence') {
switch($action)
{
    case 'accueil':
        require '../view/frontend/homeView.php';
        break;
    case 'vol':
        $arpts = findArpts();
        $vols = findVols();
        require('../view/frontend/volView.php');
        break;
    case 'reservation':
        $reservations = findReservations($_SESSION['idUsers']);
        require('../view/frontend/reservAllView.php'); 
        break;
    case 'pdf':
        header('Location: reservation.php$id=');
        break;
    case 'client':
        require('../view/frontend/clientView.php'); 
        break;
}
}
else echo'erreur';

?>

<?php
require(dirname(__DIR__).'./view/_layout.php');