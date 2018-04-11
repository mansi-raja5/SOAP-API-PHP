<?php
require_once "lib/nusoap.php";
//$client = new nusoap_client("http://localhost:81/soap/productlist.php");
$client = new nusoap_client("apiTwo.wsdl", true);
$client->setCredentials("billingadmin;20","123qwe","basic");

$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

$user['ach']="";
$user['autoRecharge']="test";
$user['autoRechargeAsDecimal']="5";
$user['automaticPaymentType']="5";
$user['balanceType']="5";
$user['blacklistMatches']="test";
$user['childIds']="5";
$user['companyName']="test";
$user['userId']="666";
$user['userIdBlacklisted']="0";
$user['userName']="userName";
$result = $client->call("createUser", array("arg0" => $user));

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo "<h2>Books</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
}

echo "<h2>Request</h2>";
echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
echo "<h2>Response</h2>";
echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";