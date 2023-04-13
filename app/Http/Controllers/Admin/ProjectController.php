<?php

namespace App\Http\Controllers\Admin;

// dopo aver spostato il controller dei progetti in admin(perche' e' qua che si gestiscono le crud) aggiungo admin al namespace e aggiungo lo use della rotta use App\Http\Controllers\Controller perche' dopo lo spostamento non era piu' leggibile class ProjectController extends Controller

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Project::all());
        $projects = Project::paginate(7)->withQueryString();
        return view('admin.projects.index',compact('projects'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project;
        return view('admin.projects.form', compact('project'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    //    il validate ha due argomenti che sono gli array 1(validazioni da fare)2(i messaggi d'errore)
       { 
        $request->validate([
            'project_preview_img'=>'nullable|url',
            'name'=>'required|string|max:100',
            'commits'=>'required|integer',
            'contributors'=>'required|integer',
            'description'=>'required|string',

        ],
        [
            'project_preview_img'=> 'You need to enter a url',
            'name'=> 'Name is Required',
            'name'=> 'The name must contain a maximum of 100 chars',
            'contributors'=> 'Contributors are Required',
            'description'=> 'Description is Required',
            'description'=> 'Description must be a text',

        ]);


        // dd($request->all());
        $project = new Project;
        $project->fill($request->all());
        $project->slug = Project::generateSlug($project->name);
        $project->save();

        // lo rimando alla vista show e gli invio sottoforma di parametro il progetto appena creato 
        return to_route('admin.projects.show',$project)
        ->with('message','Project created successfully');
        // ->with('status', 'Profile updated!');;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // ritorniamo semplicemente la view della show e usiamo il compact per inviare array e le sue value
       return view('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        // $project = new Project;
        return view('admin.projects.form', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // $project->update($request->all());differenza tra update e fill che update riempie e salva insieme quindi se devo fare operazione nel mezzo faccio fill e save
        
        $project->fill($request->all());
        $project->slug = Project::generateSlug($project->name);
        $project->save();
        return to_route('admin.projects.show', $project)->with('message',"Project $project->name Modified successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {   
        $name_project = $project->name;
        $project->delete();
        return to_route('admin.projects.index')->with('message',"Project $name_project Delete successfully");
    }
}