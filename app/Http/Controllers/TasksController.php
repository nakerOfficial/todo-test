<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class TasksController extends Controller
{
    public function index()
    {
        $data = TasksModel::active()->get();

        return response()->json($data);
    }

    public function create(){ }
    public function store(Request $request){}

    public function show($id)
    {
        $data = TasksModel::findOrFail($id);

        return response()->json($data);
    }

    public function edit($id){ }

    public function update(Request $request, $id)
    {
        $user = Auth::user();

        if (!$user) {
            throw new AccessDeniedHttpException('Authorization error '.Route::currentRouteName(), null, 401);
        }

        $task = TasksModel::findOrFail($id);
        $task->user()->associate($user);
        $task->save();

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = TasksModel::findOrFail($id);
        $task->user()->dissociate();
        $task->save();

        return response()->json($task);
    }
}
