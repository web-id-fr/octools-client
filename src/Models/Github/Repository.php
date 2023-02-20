<?php

namespace WebId\OctoolsClient\Models\Github;

use Illuminate\Contracts\Support\Arrayable;

class Repository implements Arrayable
{
    public function __construct(
        public readonly string $name,
        public readonly string $url,
        public readonly string $updatedAt,
    ) {
    }

    public static function fromArray(array $item): self
    {
        return new self(
            $item['name'],
            $item['url'],
            $item['updatedAt']
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
