<?php

namespace WebId\OctoolsClient\Models\Gryzzly;

use Illuminate\Contracts\Support\Arrayable;

class Declaration implements Arrayable
{
    public function __construct(
        public readonly string $id,
        public readonly string $duration,
        public readonly string $date,
        public readonly ?string $description,
        public readonly string $taskId,
        public readonly string $userId,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['duration'],
            $data['date'],
            $data['description'] ?? null,
            $data['taskId'],
            $data['userId'],
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
