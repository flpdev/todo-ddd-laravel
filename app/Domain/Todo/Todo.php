<?php
namespace App\Domain\Todo;

class Todo
{
    public function __construct(
        public readonly ?int $id,
        public readonly int $userId,
        public string $title,
        public ?string $description,
        public bool $completed
    ){}
}
