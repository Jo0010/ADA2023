@extends('header')
@section('content')
<div class="col-sm-8" style="background: rgba(204, 204, 204,
        0.5);padding:5%;width:100%">
    <h2 style="text-align: center">Les utilisateurs</h2>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
          
            <th>Nom</th>
            <th>email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Editer</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $users->links() !!}
</div>
@endsection