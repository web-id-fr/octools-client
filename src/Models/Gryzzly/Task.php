<?php

namespace WebId\ToadClient\Models\Gryzzly;

class Task
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $projectId,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self($data['id'], $data['name'], $data['projectId']);
    }
}
