<?php

                if (isset($_GET[$images_investissement->table."-all"])) {
                    $output=$images_investissement->All();
                }
                if (isset($_GET[$images_investissement->table."-new"])) {
                    // Test if exist
                    // print_r($_FILES["images"]);
                    foreach ($_FILES as $k => $v) {
                        // print_r($v);
                        // print_r($_FILES[$k]["tmp_name"]);
                        // Recuperation names of files
                        $tmps=$_FILES[$k]["tmp_name"];
                        if (is_array($tmps)) {
                            $_POST[$k]="";
                            foreach ($tmps as $tmp) {
                                $_POST[$k].=webp($tmp,40,$prefix="jeb".time(),$dir='uploads/investissements/')["final"]["name"].",";
                                sleep(1);
                            }
                        }else{
                            $_POST[$k]=webp($_FILES[$k]['tmp_name'],40,$prefix="jeb".time(),$dir="uploads/investissements/")["final"]["name"];
                        }

                    }
                    $output=$images_investissement->new($_POST);
                    $id=$investissments->by(["id"=>$_POST["id_investissement"]])["data"][0];
                    notification("Vous avez reçu des images","Les images de l'un des vos investissements.","/?profile&investissements","",[$id["client_id"]],$notifications,$notifications_store);
                    $admins=[];
                    foreach ($clients->by(["type"=>"administrateur"])["data"] as $va) {
                        array_push($admins,$va["id"]);
                    }
                    // print_r($);
                    notification("Nouvel utilisateur JEB","Souhaitez la bienvenu à ".$_POST["nom"],"/?apps/profile/admin.html","",$admins,$notifications,$notifications_store);
                    
                }
                if (isset($_GET[$images_investissement->table."-byId"])) {
                    $output=$images_investissement->byId($_GET[$images_investissement->table."-byId"]);
                }
                if (isset($_GET[$images_investissement->table."-update"])) {
                    $output=$images_investissement->update($_GET[$images_investissement->table."-update"],$_POST);
                }
                if (isset($_GET[$images_investissement->table."-delete"])) {
                    $output=$images_investissement->delete($_GET[$images_investissement->table."-delete"]);
                }
                if (isset($_GET[$images_investissement->table."-search"])) {
                    $output=$images_investissement->search($_POST);
                }
                if (isset($_GET[$images_investissement->table."-by"])) {
                    $output=$images_investissement->by($_POST);
                }
            