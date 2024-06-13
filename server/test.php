<?php
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

    // echo jebICD("2024-06-20 12:00:00",10);

    // $x=[1,2,4,5];
    // foreach ($x as $e) {
    //     if ($e==4) {
    //         continue;
    //     }
    //     echo $e;
    // }
    echo time();
    