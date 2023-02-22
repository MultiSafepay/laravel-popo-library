<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class Affiliate extends Model
{
    /** \Multisafepay\Models\AffiliateSplitPayment */
    public array $split_payments;
}
