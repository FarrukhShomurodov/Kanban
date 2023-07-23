<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $project = Project::query()->get();
        return ProjectResource::collection($project);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return ProjectResource
     */
    public function store(ProjectRequest $request): ProjectResource
    {
        $project = Project::query()->create($request->validated());
        return ProjectResource::make($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return ProjectResource
     */
    public function update(Request $request, Project $project): ProjectResource
    {
        $project->update($request->validated());
        return ProjectResource::make($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return Response
     */
    public function destroy(Project $project): Response
    {
        $project->delete();
        return \response('project was deleted', 200);
    }
}
