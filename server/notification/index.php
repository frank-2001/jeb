<?php
require_once "vendor/autoload.php";
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

function notification($title,$body,$url,$image,$users="ALL",$notif,$notif_store){
    $ttl=60*60*24;
    // function sendNotif($title,$body,$url,$image){
        $auth = [
            'VAPID' => [
                'subject' => 'frankmakolongo@gmail.com', // can be a mailto: or your website address
                'publicKey' => 'BNhvnz9Sj3HPvKQdS4XEHnmsLg1eq-dpYumHxQydMV927Jn2YskhPbiAJ5VsEW-_oQR0Ht1NsKSKUW02heMkvKE', // (recommended) uncompressed public key P-256 encoded in Base64-URL
                'privateKey' => 'XyVMLNDK7xxQMvXgzlECpC2TfZ-PvDD5b1HQS2x3zfg', // (recommended) in fact the secret multiplier of the private key encoded in Base64-URL
            ],
        ];
        $defaultOptions = [
            'TTL' => $ttl, // defaults to 4 weeks
            'urgency' => 'high', // protocol defaults to "normal". (very-low, low, normal, or high)
            'topic' => 'laloca', // not defined by default. Max. 32 characters from the URL or filename-safe Base64 characters sets
            'batchSize' => 200, // defaults to 1000
        ];
        $webPush = new WebPush($auth,$defaultOptions);
        
        
        $payload=json_encode([
            "title"=>$title,
            "body"=>$body,
            "url"=>$url,
            "image"=>$image
        ]);
        // '{"title": "Nouvelle maison a louer","body": "En ville de Beni quartier Matonge, au prix de 50$","url":"/","image":"http://localhost/laloca/server/images/3/Laloca1694867912.jpg" }';
        // or for one notification
        $subscribers=[];
        // print_r($notif->all());

        if ($users=="ALL") {
            foreach ($notif->all()["data"] as $key) {
                $sub=Subscription::create(jsonToArray($key["subscription_id"]));
                $webPush->queueNotification($sub,$payload);
                if ($key["id_user"]!=NULL) {
                    $notif_store->new([
                        "title"=>$title,
                        "body"=>$body,
                        "url"=>$url,
                        "image"=>$image,
                        "id_user"=>$key["id_user"] 
                    ]);    
                }
                
            }
        }else{
            foreach ($users as $v) {
                // print_r($v);
                foreach ($notif->by(["id_user"=>$v])["data"] as $key) {
                    $notif_store->new([
                        "title"=>$title,
                        "body"=>$body,
                        "url"=>$url,
                        "image"=>$image,
                        "id_user"=>$key["id_user"] 
                    ]);
                    
                    $sub=Subscription::create(jsonToArray($key["subscription_id"]));
                    $webPush->queueNotification($sub,$payload);

                }
            }
        }
        foreach ($webPush->flush() as $report) {
            $endpoint = $report->getRequest()->getUri()->__toString();
            if ($report->isSuccess()) {
                // echo "[v] Message sent successfully for subscription {$endpoint}.";
            } else {
                // echo "[x] Message failed to sent for subscription {$endpoint}: {$report->getReason()}";
            }
        }
}
function jsonToArray($jsonString) {
    // Decode the JSON string to a PHP associative array.
    $array = json_decode($jsonString, true);

    // Get the keys and values of the associative array.
    $keys = array_keys($array);
    $values = array_values($array);

    // Create a new array to store the key and value for each element.
    $keyValueArray = [];

    // Iterate over the keys and values and store them in the new array.
    for ($i = 0; $i < count($keys); $i++) {
        $keyValueArray[$keys[$i]] = $values[$i];
    }

    // Return the new array.
    return $keyValueArray;
}