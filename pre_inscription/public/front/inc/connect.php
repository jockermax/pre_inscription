<?php
$host ='localhost';
$bd ='visa';
$user ="root";
$pwd='';

try {
    $pdo =new PDO("mysql:host=$host;dbname=$bd",$user,$pwd);

} catch (PDOException $e) {
    die("error : ".$e-> getMessage());
}

?>