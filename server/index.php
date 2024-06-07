<?php        
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    setlocale(LC_TIME,["fr","fra","fr_FR"]);
    $output=array("message"=>"Aucune requete","state"=>true,"data"=>[]);
    require "classes/bdd.class.php";
    require "notification/index.php";
    require "requirement.php";
    echo json_encode($output);
        