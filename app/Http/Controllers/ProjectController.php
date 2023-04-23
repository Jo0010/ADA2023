<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Image;
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

        $projects = Project::all();
        $images = Image::all();
        return view('gallery')->with('projects',$projects)->with('images',$images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',

        ]);

        Project::create($request->all());
        $images = Image::all();
        $projects = Project::all();
        return view('gallery',compact('images','projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $Project)
    {
        $images = Image::all();
        $projects = Project::all();
        return view('gallery',compact('images','projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $Project)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $Project->update($request->all());

        return redirect()->route('projects.index')
                        ->with('success','description updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $Project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $Project)
    {
        $Project->delete();
/*
        $images = Image::all();
        $projects = Project::all();
        return view('gallery',compact('images','projects'));*/
        return redirect()->route('projects.index');
    }
}
