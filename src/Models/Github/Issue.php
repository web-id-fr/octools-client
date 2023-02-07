<?php

namespace WebId\ToadClient\Models\Github;

class Issue
{
    public function __construct(
        public readonly string $title,
        public readonly int $number,
        public readonly string $state,
        public readonly string $url,
        public readonly string $updatedAt,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'],
            $data['number'],
            $data['state'],
            $data['url'],
            $data['updatedAt']
        );
    }
}
