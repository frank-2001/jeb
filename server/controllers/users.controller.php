<?php

                if (isset($_GET[$users->table."-all"])) {
                    $output=$users->All();
                }
                if (isset($_GET[$users->table."-new"])) {
                    $output=$users->new($_POST);
                }
                if (isset($_GET[$users->table."-byId"])) {
                    $output=$users->byId($_GET[$users->table."-byId"]);
                }
                if (isset($_GET[$users->table."-update"])) {
                    $output=$users->update($_GET[$users->table."-update"],$_POST);
                }
                if (isset($_GET[$users->table."-delete"])) {
                    $output=$users->delete($_GET[$users->table."-delete"]);
                }
                if (isset($_GET[$users->table."-search"])) {
                    $output=$users->search($_POST);
                }
            