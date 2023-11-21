<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Api\Params\Shows;

use Rtransat\Betaseries\Api\Params\AbstractParams;

final class DisplayParams extends AbstractParams
{
    public function __construct(
        ?int $id = null,
        ?int $tmdbId = null,
        ?string $imdbId = null,
        ?string $url = null,
    ) {
        $this->params = [
            'id' => $id,
            'tmdb_id' => $tmdbId,
            'imdb_id' => $imdbId,
            'url' => $url,
        ];
    }
}
