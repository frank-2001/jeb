<?php

                if (isset($_GET[$formations->table."-all"])) {
                    $output=$formations->All();
                }
                if (isset($_GET[$formations->table."-new"])) {
                    $conv=webp($_FILES['image']['tmp_name'],40,$prefix="jeb".time(),$dir='uploads/formations/');
                    $_POST["image"]=$conv["final"]["name"];
                    $output=$formations->new($_POST);
                    $url=$formations->by($_POST)["data"];
                    if ($url) {
                        $url="/?formation=".$url[0]["id"];
                    }else{
                        $url="";
                    }
                
                    notification("Nouvelle formations sur JEB : ".$_POST["titre"].", desormais sur JEB","du ".$_POST["debut"]."au ".$_POST["fin"].", hatez-vous car les places son limitée.",$url,"server/uploads/formations/".$_POST["image"],"ALL",$notifications,$notifications_store);
                }
                if (isset($_GET[$formations->table."-byId"])) {
                    $output=$formations->byId($_GET[$formations->table."-byId"]);
                }
                if (isset($_GET[$formations->table."-update"])) {
                    $output=$formations->update($_GET[$formations->table."-update"],$_POST);
                }
                if (isset($_GET[$formations->table."-delete"])) {
                    $output=$formations->delete($_GET[$formations->table."-delete"]);
                }
                if (isset($_GET[$formations->table."-search"])) {
                    $output=$formations->search($_POST);
                }
                if (isset($_GET[$formations->table."-by"])) {
                    $output=$formations->by($_POST);
                }
                
            