<?php

namespace App\Http\Controllers;

use App\Models\TasksModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class UsersAdmController extends Controller
{
    public function index()
    {
        $data = User::all();

        return response()->json($data);
    }

    public function create(){ }
    public function store(Request $request){ }

    public function show($id)
    {
        $data = User::findOrFail($id);
        $data->loadMissing(['tasks']);

        return response()->json($data);
    }

    public function edit($id){ }
    public function update(Request $request, $id){ }

    public function destroy($id)
    {
        $tasks = TasksModel::where('user_id', $id)->get();
        foreach ($tasks as $task) {
            $task->user()->dissociate();
            $task->save();
        }

        User::destroy($id);
    }

}
