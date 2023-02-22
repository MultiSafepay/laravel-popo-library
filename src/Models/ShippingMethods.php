<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class ShippingMethods extends Model
{
    public ShippingMethodPickup $pickup;

    /** \Multisafepay\Models\ShippingMethod */
    public array $flat_rate_shipping;
}
