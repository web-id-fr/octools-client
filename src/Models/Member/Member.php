<?php

namespace WebId\ToadClient\Models\Member;

class Member
{
    private function __construct(
        readonly public ?int $id,
        readonly public string $firstname,
        readonly public string $lastname,
        readonly public string $email,
        readonly public string $birthdate,
        readonly public MemberWorkspace $workspace,
        readonly public string $github,
        readonly public string $slack,
        readonly public string $gryzzly,
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
            $array['services'][0]['config']['username'],
            $array['services'][1]['config']['slack_member_id'],
            $array['services'][2]['config']['uuid'],
        );
    }

    public function getKey(): ?int
    {
        return $this->id;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function lastname(): string
    {
        return $this->lastname;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function github(): string
    {
        return $this->github;
    }

    public function gryzzly(): string
    {
        return $this->gryzzly;
    }

    public function slack(): string
    {
        return $this->slack;
    }
}
