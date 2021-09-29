<?php


class Order
{
    /**
     * @var Receiver
     */
    public Receiver $receiver;

    /**
     * @var Sender
     */
    public Sender $sender;

    /**
     * @var Parcel
     */
    public Parcel $parcel;

    /**
     * Order constructor.
     * @param Receiver $receiver
     * @param Sender $sender
     * @param Parcel $parcel
     */
    public function __construct(Receiver $receiver, Sender $sender, Parcel $parcel)
    {
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->parcel = $parcel;

        echo 'Setting Order.' . PHP_EOL;
    }
}