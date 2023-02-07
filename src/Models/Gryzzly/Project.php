<?php

namespace WebId\ToadClient\Models\Gryzzly;

class Project
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
}
