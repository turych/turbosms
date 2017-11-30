<?php

namespace TurboSms\Gateway;

class Soap
{
    protected $client;

    protected $credentials;

    public function __construct($auth)
    {
        $this->client = new \SoapClient('http://turbosms.in.ua/api/wsdl.html');
        $this->setCredentials($auth['login'], $auth['password']);
    }

    protected function setCredentials($login, $password)
    {
        $this->credentials = [
            'login' => $login,
            'password' => $password
        ];
    }

    public function authenticate()
    {
        $result = $this->client->Auth($this->credentials);
        if ($result->AuthResult != 'Вы успешно авторизировались') {
            throw new \Exception("TurboSms Soap: " . $result->AuthResult);
        }
    }

    public function getBalance()
    {
        $result = $this->client->GetCreditBalance();

        if (isset($result->GetCreditBalanceResult)) {
            return intval($result->GetCreditBalanceResult);
        }

        throw new \Exception('TurboSms Soap: Cannot get balance');
    }

    public function sendSms($sms)
    {
        return $this->client->SendSms($sms);
    }
}