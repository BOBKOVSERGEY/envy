<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Concerns\Repositories\HasDatabase;
use App\Models\ShellConfig;
use Illuminate\Database\Eloquent\Model;
use Throwable;

final class ConfigRepository
{
    use HasDatabase;

    /**
     * @param string $data
     * @param string $shell
     * @param string $device
     * @return Model|ShellConfig
     * @throws Throwable
     */
    public function create(string $data, string $shell, string $device): Model|ShellConfig
    {
        return $this->database->transaction(
            callback: fn () => ShellConfig::query()->create([
                'data' => $data,
                'shell_id' => $shell,
                'device' => $device,
            ]),
            attempts: 2
        );

    }
}
