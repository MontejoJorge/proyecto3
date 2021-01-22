<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');



    require_once "bbdd.php";
    $dbh = connect();

    //$data = array( 'id' => $id );
    $stmt = $dbh->prepare("SELECT  * FROM puntos");


    $stmt->execute();
    $myjson=[];
   while ( $fila =  $stmt->fetch()){
       $arrayRepe=["latitud"=>$fila["latitud"], "longitud"=>$fila["longitud"]];
       array_push($myjson, $arrayRepe);
   }

echo json_encode($myjson);


