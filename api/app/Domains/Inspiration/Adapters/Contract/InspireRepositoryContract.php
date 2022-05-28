<?php

declare(strict_types=1);

namespace App\Domains\Inspiration\Adapters\Contract;

use App\Domains\Inspiration\Entities\Contract\QuoteContract;

/**
 * Class InspireRepositoryContract
 *
 * @package App\Domains\Inspiration\Adapters\Repository
 */
interface InspireRepositoryContract
{
    /**
     * @return QuoteContract
     */
    public function getInspirationalQuote(): QuoteContract;
}
