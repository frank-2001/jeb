<?php

                if (isset($_GET[$notifications->table."-all"])) {
                    $output=$notifications->All();
                }
                if (isset($_GET[$notifications->table."-new"])) {
                    $output=$notifications->new($_POST);
                }
                if (isset($_GET[$notifications->table."-byId"])) {
                    $output=$notifications->byId($_GET[$notifications->table."-byId"]);
                }
                if (isset($_GET[$notifications->table."-update"])) {
                    $output=$notifications->update($_GET[$notifications->table."-update"],$_POST);
                }
                if (isset($_GET[$notifications->table."-delete"])) {
                    $output=$notifications->delete($_GET[$notifications->table."-delete"]);
                }
                if (isset($_GET[$notifications->table."-search"])) {
                    $output=$notifications->search($_POST);
                }
                if (isset($_GET[$notifications->table."-by"])) {
                    
                    $output=$notifications->by($_POST);
                }
            