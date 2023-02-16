<?php

namespace WebId\OctoolsClient\Models\Github;

class User
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
}
