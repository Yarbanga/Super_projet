<?php 

function debug($variable){
    echo '<pre>'. print_r($variable, true). '</pre>';
}

function str_random($length){
   $alphabet="0123456789zerttyuiopqsdffghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXVBN";
   return substr(str_repeat($alphabet, $length), 0, $length);
}

function yaya_est_la(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
      }
    if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger']="Vous n'avez pas le droit d'acceder a cette page";
        header('location:login.php');
    exit();
    }
}