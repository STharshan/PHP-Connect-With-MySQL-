<?php
    $sever ="localhost:3308";
    $user ="root";
    $password ="";
    $dbname ="grade";
    
    try{
        $con = new PDO("mysql:host=$sever;dbname=$dbname","$user","$password");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOExcetion $e){
        die("Error in connection");
    }
?>