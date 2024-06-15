<?php        
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    setlocale(LC_TIME,["fr","fra","fr_FR"]);
    $output=array("message"=>"Aucune requete","state"=>true,"data"=>[]);
    require "classes/bdd.class.php";
    require "notification/index.php";
    require "requirement.php";
    if (isset($_GET["testpay"])) {
        $myDictionary = $_POST;

        // Convert the dictionary to a string
        $asString = implode(', ', array_map(
            function ($key, $value) {
                return "$key=$value";
            },
            array_keys($myDictionary),
            $myDictionary
        ));
        file_put_contents("API.txt",$asString);
    }
    echo json_encode($output);
        