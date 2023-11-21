<?php

declare(strict_types=1);

namespace Rtransat\Betaseries\Api\Responses;

final readonly class Show
{
    private int $id;
    private string $title;
    private string $description;

    public function __construct(
        int $id,
        string $title,
        string $description
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    public static function fromResponse(array $data): Show
    {
        return new self(
            $data['id'],
            $data['title'],
            $data['description'],
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
