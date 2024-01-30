<?php

namespace App\Savers\Interfaces;

/**
 * @phpstan-type Data array{name: string, appeal: string}
 */
interface SaverInterface
{
    /**
     * @param Data $data
     * @return void
     */
    public function save(array $data): void;
}
