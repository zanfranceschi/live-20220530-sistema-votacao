<?php

declare(strict_types=1);

namespace App\Domains\Voting\Adapters\Repository\Contract;

use App\Domains\Voting\Entities\Contract\BallotContract;

/**
 * Class BallotRepositoryContract
 *
 * @package App\Domains\Voting\Adapters\Repository\Contract
 */
interface BallotRepositoryContract
{
    /**
     * @param string $vote
     *
     * @return BallotContract
     */
    public function computeVote(string $vote): BallotContract;
}
