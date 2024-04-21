<?php

                if (isset($_GET[$articles->table."-all"])) {
                    $output=$articles->All(" * ","ORDER BY ID DESC");
                }
                if (isset($_GET[$articles->table."-new"])) {
                    $conv=webp($_FILES['image']['tmp_name'],40,$prefix="jeb".time(),$dir='uploads/articles/');
                    $_POST["image"]=$conv["final"]["name"];
                    $output=$articles->new($_POST);
                }
                if (isset($_GET[$articles->table."-byId"])) {
                    $output=$articles->byId($_GET[$articles->table."-byId"]);
                }
                if (isset($_GET[$articles->table."-update"])) {
                    $output=$articles->update($_GET[$articles->table."-update"],$_POST);
                }
                if (isset($_GET[$articles->table."-delete"])) {
                    $output=$articles->delete($_GET[$articles->table."-delete"]);
                }
                if (isset($_GET[$articles->table."-search"])) {
                    $output=$articles->search($_POST);
                }
            