<?php

namespace App\Savers;

use App\Models\Review;
use App\Savers\Interfaces\SaverInterface;

class DataSaver implements Interfaces\SaverInterface
{

    public function save(array $data): void
    {
        Review::create($data);
    }
}
