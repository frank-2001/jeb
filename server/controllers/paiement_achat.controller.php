<?php

                if (isset($_GET[$paiement_achat->table."-all"])) {
                    $output=$paiement_achat->All();
                }
                if (isset($_GET[$paiement_achat->table."-new"])) {
                    $output=$paiement_achat->new($_POST);
                }
                if (isset($_GET[$paiement_achat->table."-byId"])) {
                    $output=$paiement_achat->byId($_GET[$paiement_achat->table."-byId"]);
                }
                if (isset($_GET[$paiement_achat->table."-update"])) {
                    $output=$paiement_achat->update($_GET[$paiement_achat->table."-update"],$_POST);
                }
                if (isset($_GET[$paiement_achat->table."-delete"])) {
                    $output=$paiement_achat->delete($_GET[$paiement_achat->table."-delete"]);
                }
                if (isset($_GET[$paiement_achat->table."-search"])) {
                    $output=$paiement_achat->search($_POST);
                }
                if (isset($_GET[$paiement_achat->table."-by"])) {
                    $output=$paiement_achat->by($_POST);
                }
            