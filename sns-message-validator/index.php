<?php
require 'vendor/autoload.php';

use Aws\Sns\Message;
use Aws\Sns\MessageValidator;
use Aws\Sns\Exception\InvalidSnsMessageException;

// Instantiate the Message and Validator
$message = Message::fromRawPostData();
$validator = new MessageValidator();

$log = new SplFileObject('messages.log', 'a');


// Validate the message and log errors if invalid.
try {
   $validator->validate($message);
} catch (InvalidSnsMessageException $e) {
   // Pretend we're not here if the message is invalid.
   http_response_code(404);
   error_log('SNS Message Validation Error: ' . $e->getMessage());
   die();
}

// Check the type of the message and handle the subscription.
if ($message['Type'] === 'SubscriptionConfirmation') {
   // Confirm the subscription by sending a GET request to the SubscribeURL
   file_get_contents($message['SubscribeURL']);
}

if ($message['Type'] === 'Notification') {
   // Do whatever you want with the message body and data.
   echo $message['MessageId'] . ': ' . $message['Message'] . "\n";
}

if ($message['Type'] === 'UnsubscribeConfirmation') {
    // Unsubscribed in error? You can resubscribe by visiting the endpoint
    // provided as the message's SubscribeURL field.
    file_get_contents($message['SubscribeURL']);
}

$log->fwrite($message['Message'] . "n");