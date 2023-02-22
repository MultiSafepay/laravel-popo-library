<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class TaxTables extends Model
{
    public TaxTableSelector $default;
    /** \Multisafepay\Models\TaxItem */
    public array $alternate;
}
