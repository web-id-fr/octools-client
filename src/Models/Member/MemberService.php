<?php

namespace WebId\OctoolsClient\Models\Member;

use Illuminate\Contracts\Support\Arrayable;

class MemberService implements Arrayable
{
    private function __construct(
        readonly public string $service,
        readonly public array $config,
    ) {
    }

    public static function fromArray(array $array): self
    {
        return new self(
            $array['service'],
            $array['config'],
        );
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
