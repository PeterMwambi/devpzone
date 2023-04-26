<?php

function connect(){
try{
$conn = new PDO("mysql:host=localhost;dbname=luxury_hotel", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
return $conn;
}
catch(PDOException $e){
    echo $e->getMessage();
}
}
?>