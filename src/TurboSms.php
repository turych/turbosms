<?php

namespace TurboSms;

class TurboSms
{
    protected $gateway;

    public function __construct($auth, $gateway)
    {
        $gateway_name = ucfirst($gateway)."Gateway";
        $this->gateway = new $gateway_name($auth);
        $this->gateway->authenticate();
    }

    /**
     * @param array $sms
     *
     * $sms = [
     *   'sender' => 'Rassilka',
     *   'destination' => '+380XXXXXXXXX',
     *   'text' => $text
     *   ];
     */
    public function send($sms)
    {
        $this->gateway->SendSMS($sms);
    }
}