<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__  . '/vendor/autoload.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;



function pr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function prx($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
}


$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AXBwzxzCpn5KhfBMUQ4gMCE_Ho44hsID8E-qdzzWpahso4dUlpWSDYZ2e5R8IO5lJNhIs0BMVcKzovPm',     // ClientID
        'EJkOEc5VAMz-OqM07QOk_8mg_vcxRcFV4wkb7Azd2PP7ru51a6LcE2LNntXEo7v5LuHnjSclNcXWAa2s'      // ClientSecret
    )
);

if (!empty($_GET['paymentId']) && !empty($_GET['PayerID'])) {
    
    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);

    $transaction = new Transaction();
    $amount = new Amount();
    $details = new Details();
    $details->setShipping(0.0)
        ->setTax(0.0)
        ->setSubtotal(10.0);
    $amount->setCurrency('INR');
    $amount->setTotal(10);
    $amount->setDetails($details);
    $transaction->setAmount($amount);
    $execution->addTransaction($transaction);
    pr($execution);

    try {
        $result = $payment->execute($execution, $apiContext);
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        pr($result);
        try {
            $payment = Payment::get($paymentId, $apiContext);
            pr($payment);
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            pr($ex->getMessage());
            exit(1);
        }
    } catch (Exception $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        pr($ex->getMessage());
        exit(1);
    }

} else {
    echo "invalid result";
}



