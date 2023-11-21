<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Api;

use Rtransat\Betaseries\Api\Params\Shows\DisplayParams;
use Rtransat\Betaseries\Api\Responses\Show;
use Rtransat\Betaseries\Api\Responses\ShowResponse;
use Rtransat\Betaseries\Contracts\Api\Shows as Contract;

class Shows extends AbstractApi implements Contract
{
    public function display(DisplayParams $params): Show
    {
        $response = $this->get('shows/display', $params);

        $showResponse = new ShowResponse(
            Show::fromResponse($response['show']),
            $response['errors']
        );

        return $showResponse->show;
    }
}
