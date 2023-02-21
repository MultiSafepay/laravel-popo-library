<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;
use Illuminate\Support\Collection;

class Affiliate extends Model
{
    /** \Multisafepay\Models\AffiliateSplitPayment */
    public Collection $split_payments;
}
