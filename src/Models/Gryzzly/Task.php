<?php

namespace Octools\Client\Models\Gryzzly;

use Illuminate\Contracts\Support\Arrayable;

class Task implements Arrayable
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

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
