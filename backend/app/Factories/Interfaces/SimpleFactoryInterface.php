<?php

namespace App\Factories\Interfaces;

use App\Savers\Interfaces\SaverInterface;

/**
 * @template T of object
 */
interface SimpleFactoryInterface
{
    /**
     * @param string $type
     * @return T
     */
    public function build(string $type): object;
}
