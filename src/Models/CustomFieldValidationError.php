<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class CustomFieldValidationError extends Model
{
    public string $nl;
    public string $en;
}
