<?php
    /*
		Configure constants for Braintree's JavaScript Client SDKs, Server SDK, and Access Token for 
		Express Checkout via Braintree SDK
	*/

	// sandbox | production
	define("ENVIRONMENT", 'sandbox'); 
	
	//define("ACCESS_TOKEN", 'access_token$sandbox$9wyz9gr9w6w3nhq7$fddc66ab5ee3f60df65e1b1e0e56a79d');
    //define("ACCESS_TOKEN", 'access_token$sandbox$pv69pjqczf3w5f6x$f504cf04e9741649417b1460f030b517'); // pepper
    define("ACCESS_TOKEN", 'access_token$sandbox$532d9xfsj9nwqk26$3cc93f4d2f806a3e3a4e33afbc07146c'); // personal
    //define("ACCESS_TOKEN", 'access_token$sandbox$8ts9kfqpyjgz6b7g$7cc059e82ab00f5e1728beb796cb024e'); // chetan us

define("BT_JAVASCRIPT_CLIENT", 'https://js.braintreegateway.com/web/3.11.0/js/client.min.js');
	define("BT_JAVASCRIPT_PAYPAL", 'https://js.braintreegateway.com/web/3.11.0/js/paypal-checkout.min.js');
	define("PP_CHECKOUT", 'https://www.paypalobjects.com/api/checkout.js');
	
	define("BRAINTREE_PHP_SDK", 'braintree-php-3.20.0/lib/Braintree.php');
	
	define("CHANNEL", 'PP-DemoPortal-EC_BT-php');
?>