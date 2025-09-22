<?php
namespace App\Application\Todo\UseCases;
use App\Domain\Todo\TodoRepositoryInterface;

class DeleteTodoUseCase
{
    public function __construct(private TodoRepositoryInterface $todoRepository){}

    public function execute(int $todoId, int $userId): bool
    {
        $todo = $this->todoRepository->findById($todoId);
        if(!$todo || $todo->userId !== $userId){
            return false;
        }

        return $this->todoRepository->delete($todoId);
    }
}
