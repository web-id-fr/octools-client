<?php

namespace Octools\Client\Models\Github;

use Illuminate\Contracts\Support\Arrayable;

class PullRequest implements Arrayable
{
    public function __construct(
        public readonly string $title,
        public readonly int $number,
        public readonly string $url,
        public readonly string $state,
        public readonly string $updatedAt,
        public readonly ?User $author,
        public readonly array $linkedIssues,
        public readonly array $assignees,
        public readonly array $reviewers,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'],
            $data['number'],
            $data['url'],
            $data['state'],
            $data['updatedAt'],
            $data['author'] ? User::fromArray($data['author']) : null,
            array_map(
                fn (array $item) => Issue::fromArray($item),
                $data['linkedIssues'] ?? []
            ),
            array_map(
                fn (array $item) => User::fromArray($item),
                $data['assignees'] ?? []
            ),
            array_map(
                fn (array $item) => User::fromArray($item),
                $data['reviewers']
            ),
        );
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'number' => $this->number,
            'url' => $this->url,
            'state' => $this->state,
            'author' => $this->author?->toArray(),
            'linkedIssues' => array_map(
                fn (Issue $issue) => $issue->toArray(),
                $this->linkedIssues
            ),
            'assignees' => array_map(
                fn (User $user) => $user->toArray(),
                $this->assignees
            ),
            'reviewers' => array_map(
                fn (User $user) => $user->toArray(),
                $this->reviewers
            ),
        ];
    }
}
