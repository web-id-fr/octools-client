<?php

namespace WebId\ToadClient\Models\Slack;

class Message
{
    public function __construct(
        public readonly string $id,
        public readonly ?string $channel_id,
        public readonly ?string $channel_name,
        public readonly ?string $user_id,
        public readonly ?string $username,
        public readonly ?array $blocks,
    ) {
    }

    public static function fromArray(array $item): self
    {
        return new self(
            $item['id'],
            $item['channel_id'] ?? null,
            $item['channel_name'] ?? null,
            $item['user_id'] ?? null,
            $item['username'] ?? null,
            $item['blocks'] ?? [],
        );
    }
}
