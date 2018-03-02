<?php
require __DIR__ . '/../vendor/autoload.php';
use Minishlink\WebPush\WebPush;

// here I'll get the subscription endpoint in the POST parameters
// but in reality, you'll get this information in your database
// because you already stored it (cf. push_subscription.php)
$subscription = json_decode(file_get_contents('php://input'), true);
print_r($subscription);

$auth = array(
    'VAPID' => array(
        'subject' => 'https://github.com/Minishlink/web-push-php-example/',
        'publicKey' => 'BMYXw_Omxk-6clX_lW-FoZpWikiwXGMs6srtPgjMZyZE0cASDcCfwdrYLh5j2dMGJjufrfqvcbeWWMtaktykAHY',
        'privateKey' => 'l740e8OGnjRHviHNem5Vx55y7ulru_aGnVhQMuOM9Y4', // in the real world, this would be in a secret file
    ),
);
    try {
        $webPush = new WebPush($auth);

        $res = $webPush->sendNotification(
        $subscription['endpoint'],
        "Hi notification",
        $subscription['key'],
        $subscription['token'],
        true
    );
print_r($res);
} catch(\Exception $ex) {
    print_r($ex->getMessage());
}

// handle eventual errors here, and remove the subscription from your server if it is expired
