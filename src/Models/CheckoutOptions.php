<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;
use Illuminate\Support\Collection;

class CheckoutOptions extends Model
{
    public bool $validate_cart = false;
    public TaxTables $tax_tables;
    /** \Multisafepay\Models\TaxItem */
    public Collection $alternate;
}
