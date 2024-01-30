<?php

namespace App\Factories;

use App\Factories\Interfaces\SimpleFactoryInterface;
use App\Savers\DataSaver;
use App\Savers\EmailSaver;
use App\Savers\Interfaces\SaverInterface;
use InvalidArgumentException;

/**
 * @implements SimpleFactoryInterface<DataSaver|EmailSaver>
 */
class SaverFactory implements Interfaces\SimpleFactoryInterface
{
    const string DATABASE_SAVER = 'database';
    const string EMAIL_SAVER = 'email';

    public function build(string $type): SaverInterface
    {
        return match ($type) {
            self::DATABASE_SAVER => new DataSaver(),
            self::EMAIL_SAVER => new EmailSaver(),
            default => throw new InvalidArgumentException('Invalid object type'),
        };
    }
}
