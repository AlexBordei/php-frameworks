<?php

require_once 'User.php';
require_once 'Client.php';

$user1 = new \Account\User(1, 'alex@whiz.ro', '1234');

$client1 = new \Account\Client('Alex', 'Bordei', 'Bucuresti', $user1);

var_dump($user1);

var_dump($client1);