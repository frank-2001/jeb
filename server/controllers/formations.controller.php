<?php

                if (isset($_GET[$formations->table."-all"])) {
                    $output=$formations->All();
                }
                if (isset($_GET[$formations->table."-new"])) {
                    $conv=webp($_FILES['image']['tmp_name'],40,$prefix="jeb".time(),$dir='uploads/formations/');
                    $_POST["image"]=$conv["final"]["name"];
                    $output=$formations->new($_POST);
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
                
            