<?php

                if (isset($_GET[$notifications_store->table."-all"])) {
                    $output=$notifications_store->All();
                }
                if (isset($_GET[$notifications_store->table."-new"])) {
                    $output=$notifications_store->new($_POST);
                    if ($_POST["url"]=="") {
                        $_POST["url"]="/";
                    }
                    notification($_POST["title"],$_POST["body"],$_POST["url"],"","ALL",$notifications,$notifications_store); 
                }
                if (isset($_GET[$notifications_store->table."-byId"])) {
                    $output=$notifications_store->byId($_GET[$notifications_store->table."-byId"]);
                }
                if (isset($_GET[$notifications_store->table."-update"])) {
                    $output=$notifications_store->update($_GET[$notifications_store->table."-update"],$_POST);
                }
                if (isset($_GET[$notifications_store->table."-delete"])) {
                    $output=$notifications_store->delete($_GET[$notifications_store->table."-delete"]);
                }
                if (isset($_GET[$notifications_store->table."-search"])) {
                    $output=$notifications_store->search($_POST);
                }
                if (isset($_GET[$notifications_store->table."-by"])) {
                    $output=$notifications_store->by($_POST);
                }
                if (isset($_GET[$notifications_store->table."-byMulti"])) {
                    $output=$notifications_store->byMulti($_POST);
                }
                
            