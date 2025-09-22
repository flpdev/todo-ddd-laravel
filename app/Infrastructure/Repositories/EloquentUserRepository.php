<?php
namespace App\Infrastructure\Repositories;

use App\Domain\User\User as UserEntity;
use App\Domain\User\UserRepositoryInterface;
use App\Models\User as EloquentUser;
class EloquentUserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email): ?UserEntity
    {
        $eloquentUSer = EloquentUser::where('email', $email)->first();

        if(!$eloquentUSer){
            return null;
        }

        return new UserEntity(
            id: $eloquentUSer->id,
            name: $eloquentUSer->name,
            email: $eloquentUSer->email,
            password: $eloquentUSer->password,
        );
    }

    public function create(array $data): UserEntity
    {
        $eloquentUser = EloquentUser::create($data);
        return new UserEntity(
            id: $eloquentUser->id,
            name: $eloquentUser->name,
            email: $eloquentUser->email,
            password: null,
        );
    }
}
