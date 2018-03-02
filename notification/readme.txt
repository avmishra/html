library: https://github.com/Minishlink/web-push-php-example
set example server in : /var/www/html/notification/web-push-php-example-master/web-push-php-example$ php -S localhost:8001 router.php
set Web configuration : public private key from firbase cloud messaging

curl "https://updates.push.services.mozilla.com/wpush/v1/gAAAAABakWsSaSvQYmCbIx25Fs7wosGTPS3LX5ON1lrlGVOqSgsnmPLQhAWGp0MFjkE5oUBjfUDo5arVcX0k7zne1BnM-YGOx79bDP3tLfeaVnddAel4GcExXHvMB4Ko-BMS9s0_9txO" \
--request POST --header "TTL: 60" --header "Content-Length: 0"


curl "https://android.googleapis.com/gcm/send/ecwTkxR9bPQ:APA91bHvF5BpeVMkGQl3fyvmZcNYIeOzST2MiwhFN_OcAdI3gVuHHXxee9qSnGp7oXhNgL4E84jnOU3gr5Hpk4F3U8F8hO8587JhOespul5VK36M6s-IYV25y5lyXQdxHbBQ1w_5W8D_" --request POST --header "TTL: 60" --header "Content-Length: 0" \
 --header "Authorization: key=AAAAMTmYWoQ:APA91bGr4-Z7VjFMSYwyQXbfZuqIoaym37zYqEHm5fXA8peelZG8pd8YSmLfvLJ0VYCQN0U3gYSRoE4OYQszK3JBttu77eWbYpF5EGpoyuGnMqjYyC-lRnIkcAXvjxjLqTKf0A-_Ad_d"


arn:aws:sns:ap-south-1:953993550758:notification-test

http://35.154.170.130/index.php