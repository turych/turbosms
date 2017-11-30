<?php

namespace TurboSms;

use TurboSms\Gateway;

class TurboSms
{
    protected $gateway;

    public function __construct($auth, $gateway)
    {
        $gateway_name = "\\TurboSms\\Gateway\\" . ucfirst($gateway);
        $this->gateway = new $gateway_name($auth);
        $this->gateway->authenticate();
    }

    /**
     * @return int
     */
    public function getBalance()
    {
        return $this->gateway->getBalance();
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
        return $this->gateway->sendSMS($sms);
    }
}