<?php

                if (isset($_GET[$migrations->table."-all"])) {
                    $output=$migrations->All();
                }
                if (isset($_GET[$migrations->table."-new"])) {
                    $output=$migrations->new($_POST);
                }
                if (isset($_GET[$migrations->table."-byId"])) {
                    $output=$migrations->byId($_GET[$migrations->table."-byId"]);
                }
                if (isset($_GET[$migrations->table."-update"])) {
                    $output=$migrations->update($_GET[$migrations->table."-update"],$_POST);
                }
                if (isset($_GET[$migrations->table."-delete"])) {
                    $output=$migrations->delete($_GET[$migrations->table."-delete"]);
                }
                if (isset($_GET[$migrations->table."-search"])) {
                    $output=$migrations->search($_POST);
                }
            