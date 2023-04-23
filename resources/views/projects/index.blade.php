@extends('header')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>projects</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Nouveau projet</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div style="background: rgba(204, 204, 204,
   0.5);padding:5%">
    <table class="table table-bordered border-dark" >
        <tr>
            
            <th>description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->description }}</td>
            <td>
                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                    <input type="hidden" value={{$project->id}} name="idp">
                    <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
                    <a class="btn btn-primary" href="{{ route('galleries.index',$project->id) }}">Ajouter une image</a>
                    
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
 
    @endsection