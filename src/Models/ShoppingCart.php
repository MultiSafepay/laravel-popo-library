<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;
use Illuminate\Support\Collection;

class ShoppingCart extends Model
{
    /** \Multisafepay\Models\ShoppingCartItem */
    public Collection $items;
}
