<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Device;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final readonly class DeviceRepository
{
    /**
     * @param DatabaseManager $database
     */
    public function __construct(
        private DatabaseManager $database
    )
    {
    }

    /**
     * @throws Throwable
     */
    public function create(array $attributes): Model|Device
    {
        return $this->database->transaction(
            callback: fn() => Device::query()->create(
                attributes: $attributes
            ),
            attempts: 2
        );
    }
}
