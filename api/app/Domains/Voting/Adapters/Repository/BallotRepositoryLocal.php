<?php

declare(strict_types=1);

namespace App\Domains\Voting\Adapters\Repository;

use App\Domains\Voting\Adapters\Repository\Contract\BallotRepositoryContract;
use App\Domains\Voting\Entities\Ballot;
use App\Domains\Voting\Entities\Contract\BallotContract;
use DateTime;
use Exception;
use Jajo\JSONDB;

/**
 * Class BallotRepositoryLocal
 *
 * @package App\Domains\Voting\Adapters\Repository
 */
class BallotRepositoryLocal implements BallotRepositoryContract
{
    /**
     * @var JSONDB|null
     */
    private ?JSONDB $database;

    /**
     * @param string $vote
     *
     * @return BallotContract
     * @throws Exception
     */
    public function computeVote(string $vote): BallotContract
    {
        $ballot = Ballot::instance([
            'vote' => $vote,
            'createdAt' => new DateTime(),
        ]);
        $this->create($ballot->toArray());
        return $ballot;
    }

    /**
     * @return JSONDB
     */
    protected function database(): JSONDB
    {
        if (!isset($this->database)) {
            $this->database = new JSONDB(config('database.drivers.json.dir'));
        }
        return $this->database;
    }

    /**
     * @param array $data
     *
     * @return void
     * @throws Exception
     */
    protected function create(array $data): void
    {
        $this->database()->insert('ballots.json', $data);
    }
}
