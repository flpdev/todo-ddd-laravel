<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Todo\TodoRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreTodoRequest;
use App\Http\Requests\Api\V1\UpdateTodoRequest;
use App\Models\Todo;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

use App\Application\Todo\UseCases\ListUserTodosUseCase;
use App\Application\Todo\UseCases\CreateTodoUseCase;
use App\Application\Todo\UseCases\FindTodoUseCase;
use App\Application\Todo\UseCases\UpdateTodoUseCase;
use App\Application\Todo\UseCases\DeleteTodoUseCase;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
class TodoController extends Controller
{

    public function __construct(
        private ListUserTodosUseCase $listUserTodosUseCase,
        private CreateTodoUseCase $createTodoUseCase,
        private FindTodoUseCase $findTodoUseCase,
        private UpdateTodoUseCase $updateTodoUseCase,
        private DeleteTodoUseCase $deleteTodoUseCase,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        $todos = $this->listUserTodosUseCase->execute(Auth::id());
        return response()->json($todos, JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request) : JsonResponse
    {
        $todo = $this->createTodoUseCase->execute($request->validated(), Auth::id());
        return response()->json($todo, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $foundTodo = $this->findTodoUseCase->execute($id, Auth::id());
        if(!$foundTodo){
            return response()->json(['message' => 'Todo not found or access denied'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($foundTodo, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, int $id): JsonResponse
    {
        $updatedTodo = $this->updateTodoUseCase->execute($id, Auth::id(), $request->validated());

        if(!$updatedTodo){
            return response()->json(['message' => 'Todo not found or access denied'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($updatedTodo, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id) : JsonResponse
    {
        $deleted = $this->deleteTodoUseCase->execute($id, Auth::id());

        if(!$deleted){
            return response()->json(['message' => 'Todo not found or access denied'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
