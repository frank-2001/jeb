<?php

                if (isset($_GET[$investissements->table."-all"])) {
                    $output=$investissements->all(" *,investissements.state AS state, investissements.id AS id "," INNER JOIN clients ON investissements.client_id=clients.id JOIN articles ON investissements.article_id=articles.id");
                }
                if (isset($_GET[$investissements->table."-new"])) {
                    $output=$investissements->new($_POST);
                }
                if (isset($_GET[$investissements->table."-byId"])) {
                    $output=$investissements->byId($_GET[$investissements->table."-byId"]);
                }
                if (isset($_GET[$investissements->table."-update"])) {
                    $output=$investissements->update($_GET[$investissements->table."-update"],$_POST);
                }
                if (isset($_GET[$investissements->table."-delete"])) {
                    $output=$investissements->delete($_GET[$investissements->table."-delete"]);
                }
                if (isset($_GET[$investissements->table."-search"])) {
                    $output=$investissements->search($_POST);
                }
                if (isset($_GET[$investissements->table."-by"])) {
                    $output=$investissements->by($_POST," *,investissements.state AS state, investissements.id AS id "," INNER JOIN clients ON investissements.client_id=clients.id JOIN articles ON investissements.article_id=articles.id ");
                }
            