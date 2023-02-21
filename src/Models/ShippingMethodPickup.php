<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class ShippingMethodPickup extends Model
{
    public string $name;
    public string $provider;
    public string $price;
}
