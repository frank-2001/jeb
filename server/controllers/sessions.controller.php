<?php

                if (isset($_GET[$sessions->table."-all"])) {
                    $output=$sessions->All();
                }
                if (isset($_GET[$sessions->table."-new"])) {
                    $output=$sessions->new($_POST);
                }
                if (isset($_GET[$sessions->table."-byId"])) {
                    $output=$sessions->byId($_GET[$sessions->table."-byId"]);
                }
                if (isset($_GET[$sessions->table."-update"])) {
                    $output=$sessions->update($_GET[$sessions->table."-update"],$_POST);
                }
                if (isset($_GET[$sessions->table."-delete"])) {
                    $output=$sessions->delete($_GET[$sessions->table."-delete"]);
                }
                if (isset($_GET[$sessions->table."-search"])) {
                    $output=$sessions->search($_POST);
                }
            