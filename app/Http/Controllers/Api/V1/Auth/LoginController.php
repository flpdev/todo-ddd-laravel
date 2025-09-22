<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Application\User\UseCases\LoginUseCase;
use App\Application\User\UseCases\RegisterUserUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;


class LoginController extends Controller
{
    public function __construct(private LoginUseCase $loginUseCase){}

    public function __invoke(LoginRequest $request): JsonResponse
    {
        $token = $this->loginUseCase->execute($request->validated());
        if(!$token){
            return response()->json([
                'message' => 'Invalid credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'message' => 'Success',
            'data' => [
                'token' => $token
            ]
        ]);
    }
}
