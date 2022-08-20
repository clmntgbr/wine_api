<?php

namespace App\Lists;

use App\Common\Traits\ListTrait;

class StatusReference
{
    use ListTrait;

    public const WAITING_VALIDATION = "waiting_validation";
    public const VALIDATED = "validated";
}
