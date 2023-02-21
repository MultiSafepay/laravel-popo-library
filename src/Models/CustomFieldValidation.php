<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;
use Illuminate\Support\Collection;

class CustomFieldValidation extends Model
{
    public string $type;
    public string $data;
    /** \Multisafepay\Models\CustomFieldValidationError */
    public Collection $error;
}
