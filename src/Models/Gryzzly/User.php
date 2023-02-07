<?php

namespace WebId\ToadClient\Models\Gryzzly;

class User
{
    public function __construct(
        public readonly string $uuid,
        public readonly string $name,
        public readonly string $email,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['uuid'],
            $data['name'],
            $data['email'],
        );
    }
}
