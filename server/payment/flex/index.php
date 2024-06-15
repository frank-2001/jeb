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
            $jsonRes = json_decode($response);
            if (isset($jsonRes->code)) {
                $code = $jsonRes->code;
                if ($code != "0") {
                    $error_message = 'Impossible de traiter la demande, veuillez réessayer';
                }else{
                    $jsonRes["state"]=true;
                    return $jsonRes;
                }
            }else{
                $error_message = 'Impossible de traiter la demande, veuillez réessayer';
            }
        }
        return ["message"=>$error_message,"state"=>false];
    }
    function in($data) {
        $this->in_out($data,"in");
    }
    function out($data) {
        $this->in_out($data,"out");
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

function get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json","Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJcL2xvZ2luIiwicm9sZXMiOlsiTUVSQ0hBTlQiXSwiZXhwIjoxNzgxNDMxMzMzLCJzdWIiOiI0ZGE2YTdjYjVmMGRjNDBkNTNlNTVhODgyOTRjYTNmNyJ9.qpK_NYCsBeGAb0m5l9aGE_0un_LNKUay_RhY_LXzF_c"));
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}
function flex($data,$gateway){
    // $data = array(
    //     "merchant" => "ETS_SIVA",
    //     "type" => "1",
    //     "phone"=>'243973472538',
    //     "reference" => "test1",
    //     "amount" => "100",
    //     "currency" => "CDF",
    //     "callbackUrl" => "https://jeb-elevage.org/server/payment/flex/callback.php",
    //     );
    $data = json_encode($data);
    // $gateway = "https://backend.flexpay.cd/api/rest/v1/paymentService";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $gateway);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: application/json","Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJcL2xvZ2luIiwicm9sZXMiOlsiTUVSQ0hBTlQiXSwiZXhwIjoxNzgxNDMxMzMzLCJzdWIiOiI0ZGE2YTdjYjVmMGRjNDBkNTNlNTVhODgyOTRjYTNmNyJ9.qpK_NYCsBeGAb0m5l9aGE_0un_LNKUay_RhY_LXzF_c"));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
    $response = curl_exec($ch);
    if(curl_errno($ch)) {
        $error_message = 'Une erreur lors du traitement de votre requête';
    }else {
        curl_close($ch);
        $jsonRes = json_decode($response);
        if (isset($jsonRes->code)) {
            $code = $jsonRes->code;
            if ($code != "0") {
                $error_message = 'Impossible de traiter la demande, veuillez réessayer';
            }else{
                $message = $jsonRes->message;
                $orderNumber = $jsonRes->orderNumber;
                return $jsonRes;
            }
        }else{
            $error_message = 'Impossible de traiter la demande, veuillez réessayer';
        }
        
        
    }
    return $error_message;
}
$data = array(
    "merchant" => "ETS_SIVA",
    "type" => "1",
    "phone"=>'243973472538',
    "reference" => "frankisss",
    "amount" => "100",
    "currency" => "CDF",
    "callbackUrl" => "https://jeb-elevage.org/server/payment/flex/callback.php",
);
// print_r(flex($data,"https://backend.flexpay.cd/api/rest/v1/paymentService"))
$flex= new flex;
print_r($flex->in($data));
// print_r(file_get_contents("https://backend.flexpay.cd/api/rest/v1/check/2100341"))
?>
