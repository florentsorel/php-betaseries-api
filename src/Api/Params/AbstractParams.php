<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Api\Params;

abstract class AbstractParams implements ParamsInterface
{
    protected array $params;

    public function toArray(): array
    {
        return array_filter($this->params, fn (?string $item) => $item !== null);
    }
}
