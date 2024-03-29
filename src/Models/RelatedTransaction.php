<?php

declare(strict_types=1);

namespace Multisafepay\Models;

use CastModels\Model;

class RelatedTransaction extends Model
{
    public int $amount;

    /** \Tests\Feature\Model\Cost */
    public array $costs;
    public string $created;
    public string $currency;
    public string $description;
    public string $modified;
    public string $status;
    public int $transaction_id;
}
