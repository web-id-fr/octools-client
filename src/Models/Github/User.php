<?php

namespace WebId\OctoolsClient\Models\Github;

use Illuminate\Contracts\Support\Arrayable;

class User implements Arrayable
{
    public function __construct(
        public readonly string $login,
        public readonly ?string $name,
        public readonly ?string $email,
    ) {
    }

    public static function fromArray(array $item): self
    {
        return new self($item['login'], $item['name'] ?? null, $item['email'] ?? null);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
