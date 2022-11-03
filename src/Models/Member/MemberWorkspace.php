<?php

namespace WebId\ToadClient\Models\Member;

class MemberWorkspace
{
    private function __construct(
        readonly public ?int $id,
        readonly public string $name,
        readonly public string $token,
    ) {
    }

    public static function fromArray(array $array): self
    {
        return new self(
            $array['id'],
            $array['name'],
            $array['token'],
        );
    }

    public function getKey(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function token(): string
    {
        return $this->token;
    }
}
