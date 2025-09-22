<?php

namespace App\Domain\User;

class User
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password,
    ){}
}
