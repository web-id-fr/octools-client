<?php

namespace Octools\Client\Models\Member;

use Illuminate\Contracts\Support\Arrayable;

class MemberWorkspace implements Arrayable
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

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
