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
                // JEB Investissment calculation Day 
                function jebICD($creation,$nb_day){
                    $creationTime=strtotime($creation);

                    $nb_dayTime=60*60*24*$nb_day;
                
                    $nowTime=time();
                
                    $ecoulTime=$nowTime-$creationTime;
                    $ecoul=round(($nowTime-$creationTime)/(60*60*24));
                    $exactEcoul=0;
                    if ($ecoul>0) {
                        if(($ecoul%$nb_day)==0){
                            $exactEcoul=$nb_day;
                        }else{
                            $exactEcoul=$ecoul%$nb_day;
                        }
                    }
                    return $exactEcoul;
                }
                
                $allInv=$investissements->all()["data"];
                
                $troisDay=[];
                $oneDay=[];
                $toDay=[];

                foreach ($allInv as $inv) {
                    if ($inv["validate"]==NULL || $inv["terminate"]!=NULL) {
                        continue;
                    }
                    $invData=["user"=>$clients->by(["id"=>$inv["client_id"]])["data"][0],"product"=>$articles->by(["id"=>$inv["article_id"]])["data"][0],"investissement"=>$inv];

                    $ecoul=jebICD($inv["validate"]." 12:00:00",$invData["product"]["nb_day_return"]);
                    if (($invData["product"]["nb_day_return"]-$ecoul)==3) {
                        array_push($troisDay,$invData);
                    }
                    if (($invData["product"]["nb_day_return"]-$ecoul)==1) {
                        array_push($oneDay,$invData);
                    }
                    if (($invData["product"]["nb_day_return"]-$ecoul)==0) {
                        array_push($toDay,$invData);
                    }
                }

                $lastT=intVal(file_get_contents("notif_time.txt"));
                if ((time()/$lastT)>=2) {
                    file_put_contents("notif_time.txt",time());
                    $admins=[];
                    foreach ($clients->by(["type"=>"administrateur"])["data"] as $va) {
                        array_push($admins,$va["id"]);
                    }
                    // print_r($troisDay);
                    // print_r($oneDay);
                    // print_r($toDay);
                    
                    if (count($troisDay)>0) {
                        $cl="";
                        $n=1;
                        foreach ($troisDay as $v) {
                            $cl=$n.".".$v["user"]["nom"]." ".$v["user"]["postnom"]." ".$v["user"]["nom"]."<br> Telephone :".$v["user"]["telephone"]."<br>  Montant : ".$v["investissement"]["pieces"]*$v["product"]["prix_investissement"]."<br><br>";
                            $n++;
                        }
                        notification("Attetion! Paiement de ".count($troisDay)." investisseur(s)  dans 3 jours!",$cl,"/?notifications","",$admins,$notifications,$notifications_store);
                    }
                    if (count($oneDay)>0) {
                        $cl="";
                        foreach ($oneDay as $v) {
                            $cl="Investissement ".$v["product"]["title"]." Montant : ".$v["investissement"]["pieces"]*$v["product"]["prix_investissement"];
                            notification("Bravo, Paiement d'un investissement dans 1 jours",$cl,"/?notifications","",[$v["user"]["id"]],$notifications,$notifications_store);
                        }
                    }
                    if (count($toDay)>0) {
                        $cl="";
                        foreach ($toDay as $v) {
                            $cl=$v["product"]["title"]." Montant : ".$v["investissement"]["pieces"]*$v["product"]["prix_investissement"];
                            notification("Enfin, Bravo le paiement est prevue pour aujourd'hui!",$cl,"/?notificationss","",[$v["user"]["id"]],$notifications,$notifications_store);
                        }
                        $cl="";
                        $n=1;
                        foreach ($toDay as $v) {
                            $cl=$n.".".$v["user"]["nom"]." ".$v["user"]["postnom"]." ".$v["user"]["nom"]."<br> Telephone :".$v["user"]["telephone"]."<br>  Montant : ".$v["investissement"]["pieces"]*$v["product"]["prix_investissement"]."<br><br>";
                            $n++;
                        }
                        notification("Le(s) Paiement(s) de(s) ".count($toDay)." investisseur(s)  sont prevus pour aujourd'hui!",$cl,"/?notifications","",$admins,$notifications,$notifications_store);
                    }
                }
            