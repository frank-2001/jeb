<?php

                if (isset($_GET[$cache->table."-all"])) {
                    $output=$cache->All();
                }
                if (isset($_GET[$cache->table."-new"])) {
                    $output=$cache->new($_POST);
                }
                if (isset($_GET[$cache->table."-byId"])) {
                    $output=$cache->byId($_GET[$cache->table."-byId"]);
                }
                if (isset($_GET[$cache->table."-update"])) {
                    $output=$cache->update($_GET[$cache->table."-update"],$_POST);
                }
                if (isset($_GET[$cache->table."-delete"])) {
                    $output=$cache->delete($_GET[$cache->table."-delete"]);
                }
                if (isset($_GET[$cache->table."-search"])) {
                    $output=$cache->search($_POST);
                }
            