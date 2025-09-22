<?php
namespace App\Application\User\UseCases;

use App\Domain\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User as EloquentUser;

class LoginUseCase
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {}

    public function execute(array $credentials): ?string
    {
        if(!Auth::attempt($credentials)){
            return null;
        }

        $eloquentUser = EloquentUser::where('email', $credentials['email'])->first();
        return $eloquentUser->createToken('auth_token')->plainTextToken;
    }
}
