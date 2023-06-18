<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('gestion', ['users' => $users]);
    }
    public function profil()
    {
        $user = Auth::user();


        return view('users.edit', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        User::create($request->all());

        return redirect()->route('users.index')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        return view('users.show',compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    /*
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user->forceFill([
            'name' => $request->name,
            'email' => $request->email,
        ])->save();

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return back()->with('status', 'Profile updated successfully!');
    }*/
    public function update(Request $request, User $user)
{
    $id = $request->input('id');
    $user = User::findOrFail($id);

    $request->validate([
        'id' => 'required',
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        'password' => ['nullable', 'string', 'min:8', 'confirmed'],
    ]);

    $user->forceFill([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    if ($request->filled('password') && $request->input('password') === $request->input('password_confirmation')) {
        $user->password = Hash::make($request->password);
    }

    $user->update();

    return back()->with('status', 'Profile updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        $User->delete();

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
