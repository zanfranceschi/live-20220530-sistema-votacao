<?php

declare(strict_types=1);

namespace App\Domains\Inspiration\Entities\Contract;

use App\Shared\Entities\Contract\EntityContract;

/**
 * Class QuoteContract
 *
 * @package App\Domains\Inspiration\Entities
 */
interface QuoteContract extends EntityContract
{
    /**
     * @return string
     */
    public function getSentence(): string;

    /**
     * @return string
     */
    public function getAuthor(): string;
}
