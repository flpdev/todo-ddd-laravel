<?php
namespace App\Domain\Todo;
use App\Domain\Todo\Todo;
interface TodoRepositoryInterface
{
    public function create(array $data): Todo;
    public function findById(int $id): ?Todo;
    public function findByUser(int $userId): array;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
