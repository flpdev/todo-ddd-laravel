<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Todo\Todo as TodoEntity;
use App\Domain\Todo\TodoRepositoryInterface;
use App\Models\Todo as EloquentTodo;
use Illuminate\Database\Eloquent\Collection;

class EloquentTodoRepository implements TodoRepositoryInterface
{
    public function create(array $data): TodoEntity
    {
        $eloquentTodo = EloquentTodo::create($data);
        return $this->toEntity($eloquentTodo);
    }

    public function findById(int $id): ?TodoEntity
    {
        $eloquentTodo = EloquentTodo::find($id);
        return $eloquentTodo ? $this->toEntity($eloquentTodo) : null;
    }

    public function findByUser(int $userId): array
    {
        return EloquentTodo::where('user_id', $userId)
            ->get()
            ->map(fn($model) => $this->toEntity($model))
            ->all();
    }

    public function update(int $id, array $data): bool
    {
        return EloquentTodo::where('id', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return EloquentTodo::destroy($id);
    }

    private function toEntity(EloquentTodo $model): TodoEntity
    {
        return new TodoEntity(
            id: $model->id,
            userId: $model->user_id,
            title: $model->title,
            description: $model->description,
            completed: $model->completed ?? false,
        );
    }
}
