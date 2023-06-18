@extends('header')
@section('content')
{{-- <div class="container">


<div class="row">
    <div class="col-sm-2">
    </div>

    <div class="col-sm-6" style="background: rgba(204, 204, 204, 0.5);padding:5%;">

        <h3 style="text-align: center">Gestion de votre profil</h3>


            <!-- Gestion Profil -->
        <p><u><b>Nom:</b></u> {{ $user->name }}</p>
        <p><u><b>Email:</b></u> {{ $user->email }}</p>
        <a class="btn btn-secondary" href="">Modifier</a>
            <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">supprimer</button>
            </form>

    </div>

    <div class="col-sm-2">
    </div>
 </div>
 </div> --}}
 <div class="card"style="background: rgba(204, 204, 204, 0.5);padding:5%;>
    <div class="card-header">
        Manage Profile
    </div>

    <div class="card-body">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('users.update',['user' => $user]) }}">
            @csrf
            @method('PUT')
            <input type="hidden" id="id" name="id" value="{{$user->id}}" />
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?: Auth::user()->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?: Auth::user()->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
        @unlessrole('Super-Admin')
        <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
        @endunlessrole
    </div>
</div>
@endsection
