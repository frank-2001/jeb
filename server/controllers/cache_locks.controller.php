<?php

                if (isset($_GET[$cache_locks->table."-all"])) {
                    $output=$cache_locks->All();
                }
                if (isset($_GET[$cache_locks->table."-new"])) {
                    $output=$cache_locks->new($_POST);
                }
                if (isset($_GET[$cache_locks->table."-byId"])) {
                    $output=$cache_locks->byId($_GET[$cache_locks->table."-byId"]);
                }
                if (isset($_GET[$cache_locks->table."-update"])) {
                    $output=$cache_locks->update($_GET[$cache_locks->table."-update"],$_POST);
                }
                if (isset($_GET[$cache_locks->table."-delete"])) {
                    $output=$cache_locks->delete($_GET[$cache_locks->table."-delete"]);
                }
                if (isset($_GET[$cache_locks->table."-search"])) {
                    $output=$cache_locks->search($_POST);
                }
            