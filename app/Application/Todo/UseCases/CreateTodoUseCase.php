<?php
namespace App\Application\Todo\UseCases;
use App\Domain\Todo\Todo;
use App\Domain\Todo\TodoRepositoryInterface;

class CreateTodoUseCase
{
    public function __construct(private TodoRepositoryInterface $todoRepository)
    {}

    public function execute(array $data, int $userId): Todo
    {
        $data['user_id'] = $userId;
        return $this->todoRepository->create($data);
    }
}
