<?php

                if (isset($_GET[$clients->table."-all"])) {
                    $output=$clients->All();
                }
                if (isset($_GET[$clients->table."-new"])) {
                    $output=$clients->new($_POST);
                }
                if (isset($_GET[$clients->table."-byId"])) {
                    $output=$clients->byId($_GET[$clients->table."-byId"]);
                }
                if (isset($_GET[$clients->table."-update"])) {
                    $output=$clients->update($_GET[$clients->table."-update"],$_POST);
                }
                if (isset($_GET[$clients->table."-delete"])) {
                    $output=$clients->delete($_GET[$clients->table."-delete"]);
                }
                if (isset($_GET[$clients->table."-search"])) {
                    $output=$clients->search($_POST);
                }
            