<?php

                if (isset($_GET[$password_reset_tokens->table."-all"])) {
                    $output=$password_reset_tokens->All();
                }
                if (isset($_GET[$password_reset_tokens->table."-new"])) {
                    $output=$password_reset_tokens->new($_POST);
                }
                if (isset($_GET[$password_reset_tokens->table."-byId"])) {
                    $output=$password_reset_tokens->byId($_GET[$password_reset_tokens->table."-byId"]);
                }
                if (isset($_GET[$password_reset_tokens->table."-update"])) {
                    $output=$password_reset_tokens->update($_GET[$password_reset_tokens->table."-update"],$_POST);
                }
                if (isset($_GET[$password_reset_tokens->table."-delete"])) {
                    $output=$password_reset_tokens->delete($_GET[$password_reset_tokens->table."-delete"]);
                }
                if (isset($_GET[$password_reset_tokens->table."-search"])) {
                    $output=$password_reset_tokens->search($_POST);
                }
            