<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class TaxRule extends Model
{
    public float $rate;
    public string $country;
}
