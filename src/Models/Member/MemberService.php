<?php

namespace WebId\OctoolsClient\Models\Member;

class MemberService
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
}
