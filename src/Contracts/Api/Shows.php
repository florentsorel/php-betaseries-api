<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Contracts\Api;

use Rtransat\Betaseries\Api\Params\Shows\DisplayParams;
use Rtransat\Betaseries\Api\Responses\Show;

interface Shows extends Api
{
    public function display(DisplayParams $params): Show;
}
