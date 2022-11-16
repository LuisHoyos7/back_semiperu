<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Empresa;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(Project $project) {
        $this->project = $project;
    }

    public function index()
    {
        return ProjectResource::collection(Project::paginate(10));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new ProjectResource(Project::create($request->all()));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(
             $this->project->where('company_id', $id)->get()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $Project)
    {
        $Project->update($request->all());

        return new ProjectResource($Project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $Project)
    {
        $Project->delete();

        return new ProjectResource($Project);
    }
}
