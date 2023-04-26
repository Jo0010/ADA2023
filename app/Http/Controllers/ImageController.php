<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Http\Request;

class ImageController extends Controller
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
        return view('images.create');
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
				'image' => 'image',
			]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $pathImg="/image/$imageName";
            $idp=$request->project_id;

            Image::create([
                'name' => $imageName,
                'path' => $pathImg,
                'project_id' =>$idp
            ]);



        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $Image)
    {
        return view('images.show',compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $Image)
    {
        return view('images.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $Image)
    {
        $request->validate([
            'name' => 'required',
            'path' => 'required',

        ]);

        $Image->update($request->all());

        return redirect()->route('projects.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $Image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $Image)
    {
        $Image->delete();


        return redirect()->route('projects.index');
    }
}
