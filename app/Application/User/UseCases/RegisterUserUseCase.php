<?php
namespace App\Application\User\UseCases;

use App\Domain\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisterUserUseCase
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function execute(array $data):array
    {
        $user = $this->userRepository->create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );

        return[
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
}
