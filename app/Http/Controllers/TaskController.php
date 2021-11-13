<?php

namespace App\Http\Controllers;

use App\Models\Task as Task;
use App\Http\Resources\Task as TaskResources;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::all();
        return response()->json(TaskResources::collection($tasks))->orderBy('id', 'desc');
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->created_at = Carbon::now('America/Sao_Paulo');
        $task->updated_at = $request->get('updated_at');

        if($task->save()) {
            return response()->json(new TaskResources($task));
        }
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json(new TaskResources($task));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->created_at = $request->input('created_at');
        $task->updated_at = Carbon::now('America/Sao_Paulo');

        if($task->save()) {
            return response()->json(new TaskResources($task));
        }
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        if($task->delete()) {
         return response()->json(new TaskResources($task));
        }
    }
}
