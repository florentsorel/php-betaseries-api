<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Api\Responses;

final readonly class Error
{
    public function __construct(
        public int $code,
        public string $text,
    ) {
    }
}
