<?php
require __DIR__  . '/vendor/autoload.php';
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AXBwzxzCpn5KhfBMUQ4gMCE_Ho44hsID8E-qdzzWpahso4dUlpWSDYZ2e5R8IO5lJNhIs0BMVcKzovPm',     // ClientID
        'EJkOEc5VAMz-OqM07QOk_8mg_vcxRcFV4wkb7Azd2PP7ru51a6LcE2LNntXEo7v5LuHnjSclNcXWAa2s'      // ClientSecret
    )
);


$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal('10.00');
$amount->setCurrency('INR');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://localhost/paypalrestapi/return.php")
    ->setCancelUrl("http://localhost/paypalrestapi/cancel.php");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);


try {
    $payment->create($apiContext);
    //echo $payment;
    header('Location:'.$payment->getApprovalLink());
    exit;
    //echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}