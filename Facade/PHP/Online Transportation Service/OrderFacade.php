<?php

require 'ApiRequest.php';
require 'Order.php';
require 'Parcel.php';
require 'Receiver.php';
require 'Sender.php';
require 'ValidateOrder.php';

class OrderFacade
{
    /**
     * @param $senderName
     * @param $senderAddress
     * @param $receiverName
     * @param $receiverAddress
     * @param $parcelName
     * @param $parcelDescription
     */
    public static function SubmitOrder(
        $senderName,
        $senderAddress,
        $receiverName,
        $receiverAddress,
        $parcelName,
        $parcelDescription
    ){
        $sender = new Sender($senderName, $senderAddress);
        $receiver = new Receiver($receiverName, $receiverAddress);
        $parcel = new Parcel($parcelName, $parcelDescription);

        $order = new Order($receiver, $sender, $parcel);

        $validate = new ValidateOrder();
        $validate->validate($order);

        (new ApiRequest([$order]))->callApi();
    }
}