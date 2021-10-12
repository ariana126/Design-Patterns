<?php

require './Entities.php';


$orders = [
    new Order('id-1', 'email-1', 'seller-1'),
    new Order('id-2', 'email-2', 'seller-2'),
    new Order('id-3', 'email-3', 'seller-3'),
    new Order('id-4', 'email-4', 'seller-4'),
];

function sendVerificationMessagesForOrders(array $orders, OrderVerificationService $verificationService)
{
    foreach ($orders as $order) {
        $verificationService->sendVerificationMessageFor($order);
    }
}


//
echo 'Version 1: Business is small, and every seller needs verification for their orders.' . PHP_EOL;
sendVerificationMessagesForOrders($orders,
    new OrderVerificationServiceImpl()
);

echo PHP_EOL;

//
echo 'Version 2: Business has grown, and now it is working with big sellers that do not need verification.' . PHP_EOL;
sendVerificationMessagesForOrders($orders,
    new OrderVerificationServiceProxy(
        new OrderVerificationServiceImpl(),
        new Config(['seller-3', 'seller-4'])
    )
);