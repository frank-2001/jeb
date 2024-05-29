<?php

                if (isset($_GET[$job_batches->table."-all"])) {
                    $output=$job_batches->All();
                }
                if (isset($_GET[$job_batches->table."-new"])) {
                    $output=$job_batches->new($_POST);
                }
                if (isset($_GET[$job_batches->table."-byId"])) {
                    $output=$job_batches->byId($_GET[$job_batches->table."-byId"]);
                }
                if (isset($_GET[$job_batches->table."-update"])) {
                    $output=$job_batches->update($_GET[$job_batches->table."-update"],$_POST);
                }
                if (isset($_GET[$job_batches->table."-delete"])) {
                    $output=$job_batches->delete($_GET[$job_batches->table."-delete"]);
                }
                if (isset($_GET[$job_batches->table."-search"])) {
                    $output=$job_batches->search($_POST);
                }
            