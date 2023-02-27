<?php

namespace Octools\Client\Models\Gryzzly;

use Illuminate\Contracts\Support\Arrayable;

class User implements Arrayable
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

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
