<?php
namespace App\Application\Todo\UseCases;
use App\Domain\Todo\Todo;
use App\Domain\Todo\TodoRepositoryInterface;

class UpdateTodoUseCase
{
    public function __construct(private TodoRepositoryInterface $todoRepository){}

    public function execute(int $todoId, int $userId, array $data): ?Todo
    {
        $todo = $this->todoRepository->findById($todoId);
        if(!$todo || $todo->userId != $userId){
            return null;
        }

        $this->todoRepository->update($todoId, $data);

        return $this->todoRepository->findById($todoId);
    }
}
