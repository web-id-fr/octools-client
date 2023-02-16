<?php

namespace WebId\OctoolsClient\Models\Slack;

class User
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $name,
        public readonly ?string $realName,
        public readonly ?string $email,
    ) {
    }

    public static function fromArray(array $item): self
    {
        return new self($item['id'], $item['name'] ?? null, $item['realName'] ?? null, $item['email'] ?? null);
    }
}
