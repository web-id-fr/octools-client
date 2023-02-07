<?php

namespace WebId\ToadClient\Models\Github;

class PullRequest
{
    public function __construct(
        public readonly string $title,
        public readonly int $number,
        public readonly string $url,
        public readonly string $state,
        public readonly ?User $author,
        public readonly array $linkedIssues,
        public readonly array $assignees,
        public readonly array $reviewers,
    ) {
    }

    public static function fromArray(array $data): self
    {
        $data['reviewers'] = array_map(
            fn (array $reviewRequest) => $reviewRequest['requestedReviewer'],
            $data['reviewRequests']['nodes'] ?? []
        );

        return new self(
            $data['title'],
            $data['number'],
            $data['url'],
            $data['state'],
            $data['author'] ? User::fromArray($data['author']) : null,
            array_map(
                fn (array $item) => Issue::fromArray($item),
                $data['closingIssuesReferences']['nodes'] ?? []
            ),
            array_map(
                fn (array $item) => User::fromArray($item),
                $data['assignees']['nodes'] ?? []
            ),
            array_map(
                fn (array $item) => User::fromArray($item),
                $data['reviewers']
            ),
        );
    }
}
