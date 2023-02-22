<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class TaxItem extends Model
{
    public string $name;
    public bool $standalone;
    /** \Multisafepay\Models\TaxRule */
    public array $rules;
}
