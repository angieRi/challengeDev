<?php
require('Account.php');

class AccountTest extends PHPUnit\Framework\TestCase
{
    public function testCvu()
    {
        $account = new Account();

        $client = new Client();
        $client->setId('29902345');
        $client->setName('María Mercedes');

        $account->setClient($client);

        $cvu = $account->getCvu();

        $this->assertEquals($account->getCvu(), '29902345-MARIA.MERCEDES');
    }

    public function testBalanceArs() {
        $account = new Account();

        $client = new Client();
        $client->setId('29902345');
        $client->setName('María Mercedes');

        $account->setClient($client);

        $account->addMovement(new Movement('USD',100));
        $account->addMovement(new Movement('ARS',100));
        $account->addMovement(new Movement('ARS',-50));
        
        $this->assertEquals($account->getBalance('ARS'), 50);
    }

    public function testBalanceUsd() {
        $account = new Account();

        $client = new Client();
        $client->setId('29902345');
        $client->setName('María Mercedes');

        $account->setClient($client);

        $account->addMovement(new Movement('USD',100));
        $account->addMovement(new Movement('ARS',100));
        $account->addMovement(new Movement('ARS',-50));
        $account->addMovement(new Movement('USD',100));
        $account->addMovement(new Movement('USD',-100));
        
        $this->assertEquals($account->getBalance('USD'), 100);
    }
    
}