<?php


try{
    //! Coonnection using PDO with Database
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'crudpdo';

    $dbcon = new PDO("mysql:host=$server; dbname=$db", $user, $password);
     $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
   
}
catch(Exception $e){
    echo" Database Not FOUND";
}
?>