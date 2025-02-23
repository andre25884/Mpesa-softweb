<?php
function mpesa_moz_link($params) {
    $apiKey = $params['api_key'];
    $publicKey = $params['public_key'];
    $serviceProviderCode = $params['service_provider_code'];
    $environment = $params['environment'];

    // Para o ambiente sandbox, usamos as seguintes configurações:
    $apiUrl = 'https://api.sandbox.vm.co.mz:18352/ipg/v1x/c2bPayment/singleStage/';

    // Dados do pagamento (usando os valores fixos fornecidos para testes)
    $invoiceId = $params['invoiceid'];
    $amount = $params['amount'];
    $clientPhone = $params['clientdetails']['phonenumber'];
    
    // Parâmetros fixos para teste
    $transactionReference = 'T12344C';
    $thirdPartyReference = '111PA2D';

    $postData = [
        "input_TransactionReference" => $transactionReference,
        "input_CustomerMSISDN" => "258843330333",
        "input_Amount" => "10",
        "input_ThirdPartyReference" => $thirdPartyReference,
        "input_ServiceProviderCode" => $serviceProviderCode
    ];

    $headers = [
        "Content-Type: application/json",
        "Origin: *",
        "Authorization: Bearer $apiKey"
    ];

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode == 200) {
        return "<div>Pagamento iniciado com sucesso. Aguarde a confirmação.</div>";
    } else {
        return "<div>Erro ao processar pagamento. Código HTTP: $httpCode</div>";
    }
}
?>
