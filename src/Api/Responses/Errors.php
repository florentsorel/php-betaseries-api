<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Api\Responses;

final readonly class Errors
{
    public function __construct(public array $error)
    {
    }
}
