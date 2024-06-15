<?php
// Récupération des données du callback
$data = json_decode(file_get_contents('php://input'), true);

// Vérification du statut de la transaction
if (isset($data['Status']) && $data['Status'] == 'Success') {
    $asString = implode(',', array_map(
        function ($key, $value) {
            return "$key=$value";
        },
        array_keys($_POST),
        $_POST
    ));
    
    file_put_contents("API.txt",$asString);
    // Récupération des informations de la transaction
    $customer_number = $data['Customer_Number'];
    $amount = $data['Amount'];
    $comment = $data['Comment'];
    $currency = $data['Currency'];
    $reference = $data['Reference'];
    $status = $data['Trans_Status'];
    $freshpay_reference = $data['PayDRC_Reference'];
    $telco_reference = $data['Financial_Institution_id'];
    $status_description = $data['Trans_Status_Description'];
    
    $asString = implode(',', array_map(
        function ($key, $value) {
            return "$key=$value";
        },
        array_keys($data),
        $data
    ));

    file_put_contents("API.txt",$asString);
    // Mise à jour de la table transaction_response
    // $query = "UPDATE transaction_response SET
    //     status = '$status',
    //     telco_reference = '$telco_reference',
    //     status_description = '$status_description',
    //     updated_at = NOW()
    // WHERE freshpay_reference = '$freshpay_reference'";
    // $result = mysqli_query($con, $query);

    // Envoi d'une réponse au callback
    if ($result) {
        http_response_code(200);
        echo "Transaction mise à jour avec succès";
    } else {
        http_response_code(400);
        echo "Échec de la mise à jour de la transaction";
    }
} else {
    // Gestion des erreurs
    http_response_code(400);
    echo "Erreur lors du traitement du callback";
}
?>