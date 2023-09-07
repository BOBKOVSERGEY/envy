<?php

declare(strict_types=1);

namespace App\Http\Payloads;

final class NewShell
{
    public function __construct(
        private readonly string $name,
        private readonly string $data,
    )
    {}

    /**
     * @return array{name: string, data: string}
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'data' => $this->data,
        ];
    }

    /**
     * @param array{name: string, data: string} $data
     * @return NewShell
     */
    public static function fromRequest(array $data): NewShell
    {
        return new NewShell(
            name: $data['name'],
            data: $data['data'],
        );
    }
}
