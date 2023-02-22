<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class ShoppingCart extends Model
{
    /** \Multisafepay\Models\ShoppingCartItem */
    public array $items;
}
