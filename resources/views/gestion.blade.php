@extends('header')
@section('content')

<div class="row">
    <div class="col-sm-2">
    </div>

    <div class="col-sm-8" style="background: rgba(204, 204, 204, 0.5);padding:5%;width:100%;">


    </div>
    <div class="col-sm-2">
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
    </div>

    <div class="col-sm-8" style="background: rgba(204, 204, 204, 0.5);padding:5%;width:100%;">

        <h3 style="text-align: center">Gestion des utilisateurs:</h3>
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8" style="padding:5%;width:100%;">
            <!-- Gestion Image -->
            <table class="table"style=" border-bottom:solid gray 2px; ">
                <tr>
                    <th>Utilisateur:</th>

                    <th width="280px">Action</th>
                </tr>
                @foreach ($users as $user)
                <tr>
                    <td><form method="POST" action="{{ route('users.update', $user) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="id" name="id" value="{{$user->id}}" />
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?: $user->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?: $user->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                    </td>
                    <td>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                    @if($user->id_role==1)

                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                    </form>

                    @endif
                    </td>
                </tr>
            @endforeach
        </table>
            </div>
            <div class="col-sm-2">
            </div>
        </div>

    </div>
    <div class="col-sm-2">
    </div>
</div>
@endsection
