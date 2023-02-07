<?php

namespace WebId\ToadClient\Models\Member;

class MemberWorkspace
{
    private function __construct(
        readonly public int $id,
        readonly public string $name,
    ) {
    }

    public static function fromArray(array $array): self
    {
        return new self(
            $array['id'],
            $array['name'],
        );
    }

    public function getKey(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
