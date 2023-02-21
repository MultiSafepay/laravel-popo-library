<?php

namespace Tests\Feature;

use Tests\TestCase;
use Multisafepay\Accounts\Api;
use Multisafepay\Models\Account;

class AccountTest extends TestCase
{
    public function testGetAll()
    {
        $api = new Api(env('MULTISAFEPAY_MERCHANT_API_KEY'));

        $accounts = $api->getAll();

        $this->assertInstanceOf(Account::class, $accounts->first());
    }
}
