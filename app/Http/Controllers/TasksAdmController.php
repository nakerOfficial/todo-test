<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\TasksModel;
use Illuminate\Http\Request;

class TasksAdmController extends Controller
{

    public function index()
    {
        $data = TasksModel::all();
        return response()->json($data);
    }

    public function create()
    {
        //
    }

    public function store(TaskRequest $request)
    {
        $data = TasksModel::create($request->all());
        return response()->json($data);
    }

    public function show($id)
    {
        $data = TasksModel::findOrFail($id);
        $data->loadMissing(['user']);
        return response()->json($data);
    }

    public function edit($id)
    {

    }

    public function update(TaskRequest $request, $id)
    {
        $data = TasksModel::findOrFail($id);
        $data->fill($request->all());
        $data->save();
        $data->loadMissing(['user']);
        return response()->json($data);
    }

    public function destroy($id)
    {
        TasksModel::destroy($id);
    }
}
