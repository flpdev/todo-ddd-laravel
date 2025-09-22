<?php
namespace App\Application\Todo\UseCases;
use App\Domain\Todo\Todo;
use App\Domain\Todo\TodoRepositoryInterface;

class FindTodoUseCase{
    public function __construct(private TodoRepositoryInterface $todoRepository){}

    public function execute(int $todoId, int $userId): ?Todo
    {
        $todo = $this->todoRepository->findById($todoId);
        if(!$todo || $todo->userId !== $userId){
            return null;
        }
        return $todo;
    }
}
