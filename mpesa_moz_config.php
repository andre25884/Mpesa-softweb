<?php
if (!defined("WHMCS")) {
    die("Acesso restrito.");
}

function mpesa_moz_config() {
    return [
        "FriendlyName" => [
            "Type" => "System",
            "Value" => "M-Pesa Moçambique"
        ],
        "api_key" => [
            "FriendlyName" => "API Key",
            "Type" => "text",
            "Size" => "50",
            "Description" => "Chave de API fornecida pelo M-Pesa",
            "Default" => "id75j1v9x01wpqqjd36qwvnfd2lm5305"
        ],
        "public_key" => [
            "FriendlyName" => "Chave Pública",
            "Type" => "textarea",
            "Rows" => "5",
            "Description" => "Chave pública RSA"
        ],
        "service_provider_code" => [
            "FriendlyName" => "Código do Provedor",
            "Type" => "text",
            "Size" => "20",
            "Description" => "Código do provedor de serviço",
            "Default" => "171717"
        ],
        "environment" => [
            "FriendlyName" => "Ambiente",
            "Type" => "dropdown",
            "Options" => "sandbox,production",
            "Description" => "Selecione o ambiente de operação",
            "Default" => "sandbox"
        ],
    ];
}
?>
