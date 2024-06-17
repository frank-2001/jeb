<?php
// req
final class flex {
    var $header=Array("Content-Type: application/json","Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJcL2xvZ2luIiwicm9sZXMiOlsiTUVSQ0hBTlQiXSwiZXhwIjoxNzgxNDMxMzMzLCJzdWIiOiI0ZGE2YTdjYjVmMGRjNDBkNTNlNTVhODgyOTRjYTNmNyJ9.qpK_NYCsBeGAb0m5l9aGE_0un_LNKUay_RhY_LXzF_c");
    var $url="https://backend.flexpay.cd/api/rest/v1/";

    function in_out($data,$action) {
        if ($action=="in") {
            $action="paymentService";
        }else if($action=="out"){
            $action="merchantPayOutService";
        }else{
            return "Action non reconnue.";
        }

        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url.$action);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $response = curl_exec($ch);
        
        if(curl_errno($ch)) {
            $error_message = 'Une erreur lors du traitement de votre requête';
        }else {
            curl_close($ch);
            return $response;
            // $jsonRes = json_decode($response);
        
            // if (isset($jsonRes->code)) {
            //     $code = $jsonRes->code;
            //     if ($code != "0") {
            //         $error_message = 'Impossible de traiter la demande, veuillez réessayer';
            //     }else{
            //         // ["code" =>"0","message" =>"Transaction envoyée avec succès. Veuillez valider le push message","orderNumber"=> "9bsTX7qXdpQe243815877848"];
            //         // print_r();
            //         return $jsonRes->orderNumber;
            //         // return ["state"=>true,"reponse"=>$jsonRes];
            //     }
            // }else{
            //     $error_message = 'Impossible de traiter la demande, veuillez réessayer';
            // }
        }
        return ["message"=>$error_message,"state"=>false];
    }
    function in($data) {
        return $this->in_out($data,"in");
    }
    function out($data) {
        return $this->in_out($data,"out");
    }
    function check($ref) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url."check/".$ref);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->header);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }   
}

// $data = [
//     "merchant" => "ETS_SIVA",
//     "type" => "1",
//     "phone"=>"243973472538",
//     "reference" => "merci",
//     "amount" => "500",
//     "currency" => "CDF",
//     "callbackUrl" => "https://jeb-elevage.org/server/payment/flex/callback.php",
// ];
// $flex= new flex;
// echo $flex->check("hWF7wrDPBSHM243973472538");
$flex= new flex;
if(isset($_GET["paiement_achat"])){
    // $paiement_achat->new($_POST);
    $_POST["reference"]=time()."_".$_POST["telephone_paiement"];
    $data = [
        "merchant" => "ETS_SIVA",
        "type" => "1",
        "phone"=>$_POST["telephone_paiement"],
        "reference" => $_POST["reference"],
        "amount" => $_POST["amount"],
        "currency" => "USD",
        "callbackUrl" => "https://jeb-elevage.org/server/payment/flex/callback.php",
    ];
    unset($_POST["amount"]);
    $paiement_achat->new($_POST);
    $p=$paiement_achat->by(["reference" => $_POST["reference"]])["data"][0];
    $output=json_decode($flex->in($data,"in"));
    $paiement_achat->update($p["id"],["code"=>$output->code,"flex_reference"=>$output->orderNumber]);
    $admins=[];
    foreach ($clients->by(["type"=>"administrateur"])["data"] as $va) {
        array_push($admins,$va["id"]);
    }
    // notification("un paiement en cours d'un.e ".$_POST["categorie"],"Une sommme de ".$_POST["montant"]."$, pour un  Numero de telephone : ".$_POST["telephone_paiement"],"/?notifications","",$admins,$notifications,$notifications_store);
}
if (isset($_GET["check_payment"])) {
    $p=$paiement_achat->by(["flex_reference"=>$_GET["check_payment"]])["data"][0];
    $output=json_decode($flex->check($_GET["check_payment"]));
    // if ($p["status"]==NULL) {
        $msg=str_replace("'"," ",$output->message);
        if ($output->transaction==NULL) {
            $paiement_achat->update($p["id"],["message"=>$msg."","status"=>-1]);
        }else{
            $paiement_achat->update($p["id"],["message"=>$msg,"status"=>$output->transaction->status]);
        }   
    // }
}
?>
