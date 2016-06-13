<?php

return [

    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
    'port' => env('MAIL_PORT', 465),
    'from' => ['address' => 'fitbookteam@gmail.com', 'name' => 'Fitbook Team'],
    'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
    'username' => env('fitbooknetwork@gmail.com'),
    'password' => env('vvoschlmsotvuapz'),
    'sendmail' => '/usr/sbin/sendmail -bs',

];
