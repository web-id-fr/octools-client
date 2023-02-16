<?php

namespace WebId\OctoolsClient\Models\Github;

class Repository
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
}
