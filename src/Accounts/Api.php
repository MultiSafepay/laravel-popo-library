<?php

declare(strict_types=1);

namespace Multisafepay\Accounts;

use Multisafepay\ApiRequest;
use Multisafepay\Models\User;
use Multisafepay\Models\Account;
use Multisafepay\Models\Site;
use Illuminate\Support\Collection;

class Api extends ApiRequest
{
    public function getAll(): null|Collection
    {
        return Account::collection($this->send('get', '/accounts'));
    }

    public function get(string $mspId): null|Account
    {
        return new Account($this->send('get', "/accounts/$mspId"));
    }

    public function getSites(string $mspId): null|Collection
    {
        return Site::collection($this->send('get', "/accounts/$mspId/sites"));
    }

    public function create(User $user, Account $account, array $currencies = ['EUR']): null|Account
    {
        $payload = [
            'user' => $user->toArray(),
            'account' => $account->toArray(),
            'currencies' => $currencies,
        ];

        $result = $this->send('post', 'signup-account', $payload);

        return new Account($result['account']);
    }

    public function createSite(string $accountId, Site $site): null|Site
    {
        $result = $this->send('post', "accounts/$accountId/sites", $site->toArray());

        return new Site($result);
    }
}
