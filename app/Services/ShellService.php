<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Payloads\NewShell;
use App\Models\Shell;
use App\Models\ShellConfig;
use App\Repositories\ConfigRepository;
use App\Repositories\ShellRepository;
use Throwable;

final readonly class ShellService
{
    public function __construct(
        private ShellRepository $shell,
        private ConfigRepository $repository,
    )
    {}

    /**
     * @param string $device
     * @param NewShell $shell
     * @return ShellConfig
     * @throws Throwable
     */
    public function register(string $device, NewShell $shell): ShellConfig
    {
        [$name, $data] = $shell->toArray();
        $model = $this->registerShell(
            name: $name
        );

        return $this->repository->create(
            data: $data,
            shell: $model->getKey(),
            device: $device
        );

    }

    /**
     * @throws Throwable
     */
    public function registerShell(string $name): Shell
    {
        return $this->shell->create(
            name: $name
        );
    }
}
