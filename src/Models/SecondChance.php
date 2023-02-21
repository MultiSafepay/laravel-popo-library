<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class SecondChance extends Model
{
    public bool $send_mail = false;
}
