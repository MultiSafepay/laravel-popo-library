<?php

declare(strict_types=1);

namespace Multisafepay\Orders;

use Multisafepay\ApiRequest;
use Multisafepay\Models\Order;

class Api extends ApiRequest
{
    public function get(string $orderId): null|Order
    {
        $data = $this->send('get', "/$orderId");

        if (empty($data)) {
            return null;
        }

        return new Order($data);
    }

    public function refundAmount(string $orderId, int $amount, string $description = '', string $currency = 'EUR'): null|array
    {
        $path = "/$orderId/refunds";

        $data = [
            'currency' => $currency,
            'amount' => $amount,
            'description' => $description,
        ];

        return $this->send('post', $path, $data);
    }

    public function refundFull(string $orderId, string $description = '', string $currency = 'EUR'): null|array
    {
        $path = "/$orderId/refunds";

        $data = [
            'currency' => $currency,
            'description' => $description,
        ];

        return $this->send('post', $path, $data);
    }

    public function create(Order $order): null|Order
    {
        $data = $this->send('post', '', $order->toArray());

        if (empty($data)) {
            return null;
        }

        $data['var1'] = $order->var1;

        return new Order($data);
    }
}
