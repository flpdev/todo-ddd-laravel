<?php
namespace App\Domain\User;

use App\Domain\User\User;

interface UserRepositoryInterface
{
    public function findByEmail(string $email): ?User;
    public function create(array $data): User;
}
