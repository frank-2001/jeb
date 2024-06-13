<?php

                if (isset($_GET[$inscription_formation->table."-all"])) {
                    $output=$inscription_formation->All("inscription_formation.id,id_user,id_formation,nom,postnom,prenom,inscription_formation.creation,inscription_formation.state,formations.titre,formations.titre,formations.debut,formations.fin","inner join clients inner join formations on id_user=clients.id");
                }
                if (isset($_GET[$inscription_formation->table."-new"])) {
                    $output=$inscription_formation->new($_POST);   
                    $admins=[];
                    foreach ($clients->by(["type"=>"administrateur"])["data"] as $va) {
                        array_push($admins,$va["id"]);
                    }
                    notification("Demande d'inscription a une formation","Un utilisaateur a envoyé une damande de participation à une formation.","/?profile&formations_","",$admins,$notifications,$notifications_store);
                    
                }
                if (isset($_GET[$inscription_formation->table."-byId"])) {
                    $output=$inscription_formation->byId($_GET[$inscription_formation->table."-byId"]);
                }
                if (isset($_GET[$inscription_formation->table."-update"])) {
                    $output=$inscription_formation->update($_GET[$inscription_formation->table."-update"],$_POST);
                }
                if (isset($_GET[$inscription_formation->table."-delete"])) {
                    $output=$inscription_formation->delete($_GET[$inscription_formation->table."-delete"]);
                }
                if (isset($_GET[$inscription_formation->table."-search"])) {
                    $output=$inscription_formation->search($_POST);
                }
                if (isset($_GET[$inscription_formation->table."-by"])) {
                    $output=$inscription_formation->by($_POST,"inscription_formation.id,id_user,id_formation,nom,postnom,prenom,inscription_formation.creation,inscription_formation.state,formations.titre,formations.debut,formations.fin","inner join clients inner join formations on id_user=clients.id");
                }
            