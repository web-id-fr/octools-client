<?php

namespace WebId\ToadClient\Models\Member;

class Member
{
    private function __construct(
        readonly public int $id,
        readonly public string $firstname,
        readonly public string $lastname,
        readonly public string $email,
        readonly public string $birthdate,
        readonly public MemberWorkspace $workspace,
        readonly public array $services,
    ) {
    }

    public static function fromArray(array $array): self
    {
        return new self(
            $array['id'],
            $array['firstname'],
            $array['lastname'],
            $array['email'],
            $array['birthdate'],
            MemberWorkspace::fromArray($array['workspace']),
            array_map(fn (array $service) => MemberService::fromArray($service), $array['services']),
        );
    }
}
