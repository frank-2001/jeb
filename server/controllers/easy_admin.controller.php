<?php

                if (isset($_GET[$easy_admin->table."-all"])) {
                    $output=$easy_admin->All();
                }
                if (isset($_GET[$easy_admin->table."-new"])) {
                    $output=$easy_admin->new($_POST);
                }
                if (isset($_GET[$easy_admin->table."-byId"])) {
                    $output=$easy_admin->byId($_GET[$easy_admin->table."-byId"]);
                }
                if (isset($_GET[$easy_admin->table."-update"])) {
                    $output=$easy_admin->update($_GET[$easy_admin->table."-update"],$_POST);
                }
                if (isset($_GET[$easy_admin->table."-delete"])) {
                    $output=$easy_admin->delete($_GET[$easy_admin->table."-delete"]);
                }
                if (isset($_GET[$easy_admin->table."-search"])) {
                    $output=$easy_admin->search($_POST);
                }
            