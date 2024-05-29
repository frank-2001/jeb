<?php

                if (isset($_GET[$failed_jobs->table."-all"])) {
                    $output=$failed_jobs->All();
                }
                if (isset($_GET[$failed_jobs->table."-new"])) {
                    $output=$failed_jobs->new($_POST);
                }
                if (isset($_GET[$failed_jobs->table."-byId"])) {
                    $output=$failed_jobs->byId($_GET[$failed_jobs->table."-byId"]);
                }
                if (isset($_GET[$failed_jobs->table."-update"])) {
                    $output=$failed_jobs->update($_GET[$failed_jobs->table."-update"],$_POST);
                }
                if (isset($_GET[$failed_jobs->table."-delete"])) {
                    $output=$failed_jobs->delete($_GET[$failed_jobs->table."-delete"]);
                }
                if (isset($_GET[$failed_jobs->table."-search"])) {
                    $output=$failed_jobs->search($_POST);
                }
            