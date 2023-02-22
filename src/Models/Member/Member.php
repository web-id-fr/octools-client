<?php

namespace WebId\OctoolsClient\Models\Member;

use Illuminate\Contracts\Support\Arrayable;

class Member implements Arrayable
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
            $array['services'],
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'birthdate' => $this->birthdate,
            'workspace' => $this->workspace->toArray(),
            'services' => $this->services,
        ];
    }
}
