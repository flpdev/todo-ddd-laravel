<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Application\User\UseCases\RegisterUserUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\RegiterUserRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function __construct(private RegisterUserUseCase $registerUserUseCase){}
    public function __invoke(RegiterUserRequest $request): JsonResponse
    {
        $user = $this->registerUserUseCase->execute($request->validated());
        return response()->json([
            'message' => 'User successfully registered',
            'data' => $user
        ], Response::HTTP_CREATED);
    }
}
