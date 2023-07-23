<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TasksRequest;
use App\Http\Resources\TasksResource;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class TasksController extends Controller
{

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $tasks = Task::query()->get();
        return TasksResource::collection($tasks);
    }

    /**
     * @param TasksRequest $request
     * @return TasksResource
     */
    public function store(TasksRequest $request): TasksResource
    {
        $validated = $request->validated();
        if($validated){
            $imagePath = $request->file('image')->store('images', 'public');
            $task = Task::query()->create([
                "title" => $validated['title'],
                "description" => $validated['description'],
                "image" => $imagePath
            ]);
        }
        return TasksResource::make($task);
    }

    /**
     * @param Task $task
     * @param TasksRequest $request
     * @return TasksResource
     */
    public function update(Task $task, TasksRequest $request): TasksResource
    {
        $validated = $request->validated();
        $imagePath = '';
        if($validated){
            if(Storage::disk('public')->exists($task->image)){
                Storage::disk('public')->delete($task->image);
                $imagePath = $request->file('image')->store('images', 'public');
            }
            $task->update([
                "title" => $validated['title'],
                "description" => $validated['description'],
                "image" => $imagePath
            ]);
        }
        return TasksResource::make($task);
    }

    /**
     * @param Task $task
     * @return Application|ResponseFactory|Response
     */
    public function destroy(Task $task)
    {
        if(Storage::disk('public')->exists($task->image)){
            Storage::disk('public')->delete($task->image);
        }
        $task->delete();
        return response("task deleted successfully", 200);
    }
}
