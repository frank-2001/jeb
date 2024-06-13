<?php

                if (isset($_GET[$clients->table."-all"])) {
                    $output=$clients->All(" * ","ORDER BY ID DESC");
                }
                if (isset($_GET[$clients->table."-new"])) {
                    $_POST["mot_de_passe"]=md5($_POST["mot_de_passe"]);
                    $output=$clients->new($_POST);
                    sleep(1);
                    $id=$clients->by($_POST)["data"][0]["id"]; 
                    notification("Bienvenu sur JEB systeme ".$_POST["nom"],"Nous somme heureux de vous compter parmi nous !","/?profile","",[$id],$notifications,$notifications_store);
                    $admins=[];
                    foreach ($clients->by(["type"=>"administrateur"])["data"] as $va) {
                        array_push($admins,$va["id"]);
                    }
                    // print_r($);
                    notification("Nouvel utilisateur JEB","Souhaitez la bienvenu à ".$_POST["nom"],"/?profile&clients","",$admins,$notifications,$notifications_store);
                    
                }
                if (isset($_GET[$clients->table."-byId"])) {
                    $output=$clients->byId($_GET[$clients->table."-byId"]);
                }
                if (isset($_GET[$clients->table."-update"])) {
                    if (isset($_POST["mot_de_passe"])) {
                        $_POST["mot_de_passe"]=md5($_POST["mot_de_passe"]);
                    }
                    $output=$clients->update($_GET[$clients->table."-update"],$_POST);
                }
                if (isset($_GET[$clients->table."-delete"])) {
                    $output=$clients->delete($_GET[$clients->table."-delete"]);
                }
                if (isset($_GET[$clients->table."-search"])) {
                    $output=$clients->search($_POST);
                }
                if (isset($_GET[$clients->table."-connect"])) {
                    $_POST["mot_de_passe"]=md5($_POST["mot_de_passe"]);
                    $output=$clients->by($_POST);
                }
                if (isset($_GET[$clients->table."-by"])) {
                    $output=$clients->by($_POST);
                }
            