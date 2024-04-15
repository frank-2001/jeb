<?php

                if (isset($_GET[$annonces->table."-all"])) {
                    $output=$annonces->All();
                }
                if (isset($_GET[$annonces->table."-new"])) {
                    $output=$annonces->new($_POST);
                }
                if (isset($_GET[$annonces->table."-byId"])) {
                    $output=$annonces->byId($_GET[$annonces->table."-byId"]);
                }
                if (isset($_GET[$annonces->table."-update"])) {
                    $output=$annonces->update($_GET[$annonces->table."-update"],$_POST);
                }
                if (isset($_GET[$annonces->table."-delete"])) {
                    $output=$annonces->delete($_GET[$annonces->table."-delete"]);
                }
                if (isset($_GET[$annonces->table."-search"])) {
                    $output=$annonces->search($_POST);
                }
            