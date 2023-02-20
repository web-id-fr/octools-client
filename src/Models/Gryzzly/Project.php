<?php

namespace WebId\OctoolsClient\Models\Gryzzly;

use Illuminate\Contracts\Support\Arrayable;

class Project implements Arrayable
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self($data['id'], $data['name']);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
