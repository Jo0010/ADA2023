<?php

namespace App\Http\AdminControllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->paginate(5);

        return view('admins.index',compact('admins'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.create');
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
            'user_id' => 'required',

        ]);

        Admin::create($request->all());

        return redirect()->route('admins.index')
                        ->with('success','Admin created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $Admin)
    {
        return view('admins.show',compact('Admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $Admin)
    {
        return view('admins.edit',compact('Admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $Admin)
    {
        $request->validate([
            'user_id' => 'required',

        ]);

        $Admin->update($request->all());

        return redirect()->route('admins.index')
                        ->with('success','Admin updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $Admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $Admin)
    {
        $Admin->delete();

        return redirect()->route('admins.index')
                        ->with('success','Admin deleted successfully');
    }
}
