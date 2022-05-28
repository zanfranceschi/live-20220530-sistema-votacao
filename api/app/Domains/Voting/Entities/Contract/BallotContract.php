<?php

declare(strict_types=1);

namespace App\Domains\Voting\Entities\Contract;

use DateTimeInterface;

/**
 * Class BallotContract
 *
 * @package App\Domains\Voting\Entities\Contract
 */
interface BallotContract
{
    /**
     * @return string
     */
    public function getVote(): string;

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface;
}
