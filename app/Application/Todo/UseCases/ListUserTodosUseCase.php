<?php

namespace App\Application\Todo\UseCases;
use App\Domain\Todo\TodoRepositoryInterface;

class ListUserTodosUseCase
{
    public function __construct(private TodoRepositoryInterface $todoRepository){

    }

    public function execute(int $userId):array
    {
        return $this->todoRepository->findByUser($userId);
    }
}
