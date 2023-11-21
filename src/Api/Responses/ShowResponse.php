<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Api\Responses;

final readonly class ShowResponse
{
    public function __construct(public Show $show, public array $errors)
    {
    }
}
