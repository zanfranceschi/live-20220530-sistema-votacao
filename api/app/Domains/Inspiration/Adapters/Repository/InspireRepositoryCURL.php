<?php

declare(strict_types=1);

namespace App\Domains\Inspiration\Adapters\Repository;

use App\Domains\Inspiration\Adapters\Contract\InspireRepositoryContract;
use App\Domains\Inspiration\Entities\Contract\QuoteContract;
use App\Domains\Inspiration\Entities\Quote;
use Exception;
use JsonException;

/**
 * Class InspireRepositoryCURL
 *
 * @package App\Domains\Inspiration\Adapters\Repository
 */
final class InspireRepositoryCURL implements InspireRepositoryContract
{
    /**
     * @return QuoteContract
     * @throws Exception
     */
    public function getInspirationalQuote(): QuoteContract
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://zenquotes.io/api/random');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        if (!$output) {
            return Quote::instance(['sentence' => 'No quote found', 'author' => '']);
        }
        try {
            $output = json_decode($output, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return Quote::instance(['sentence' => 'Can not get a quote now', 'author' => '']);
        }
        if (!is_array($output) || count($output) === 0) {
            return Quote::instance(['sentence' => 'Can not get a quote now', 'author' => '']);
        }
        $sentence = $output[0]['q'] ?? '';
        $author = $output[0]['a'] ?? '';
        return Quote::instance(['sentence' => $sentence, 'author' => $author]);
    }
}
