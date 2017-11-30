<?php

namespace TurboSms;

class SoapGateway
{
    protected $client;

    protected $credentials;

    public function __construct($auth)
    {
        $this->client = new SoapClient('http://turbosms.in.ua/api/wsdl.html');
        $this->setCredentials($auth['login'], $auth['password']);
    }

    protected function setCredentials($login, $password)
    {
        $this->credentials = [
            'login' => $login,
            'password' => $password
        ];
    }

    protected function authenticate()
    {
        return $client->Auth($this->credentials);
    }
}