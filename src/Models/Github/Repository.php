<?php

namespace Octools\Client\Models\Github;

use Illuminate\Contracts\Support\Arrayable;

class Repository implements Arrayable
{
    public function __construct(
        public readonly int $databaseId,
        public readonly string $name,
        public readonly ?string $description,
        public readonly string $url,
        public readonly bool $isFork,
        public readonly string $sshUrl,
        public readonly string $updatedAt,
    ) {
    }

    public static function fromArray(array $item): self
    {
        return new self(
            $item['databaseId'],
            $item['name'],
            $item['description'],
            $item['url'],
            $item['isFork'],
            $item['sshUrl'],
            $item['updatedAt'],
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
