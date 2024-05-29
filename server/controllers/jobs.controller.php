<?php

                if (isset($_GET[$jobs->table."-all"])) {
                    $output=$jobs->All();
                }
                if (isset($_GET[$jobs->table."-new"])) {
                    $output=$jobs->new($_POST);
                }
                if (isset($_GET[$jobs->table."-byId"])) {
                    $output=$jobs->byId($_GET[$jobs->table."-byId"]);
                }
                if (isset($_GET[$jobs->table."-update"])) {
                    $output=$jobs->update($_GET[$jobs->table."-update"],$_POST);
                }
                if (isset($_GET[$jobs->table."-delete"])) {
                    $output=$jobs->delete($_GET[$jobs->table."-delete"]);
                }
                if (isset($_GET[$jobs->table."-search"])) {
                    $output=$jobs->search($_POST);
                }
            