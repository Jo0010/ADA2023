@extends('header')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Commentaires TEST</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('comments.create') }}"> Nouveau commentaire</a>
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

            <th>commentaire</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($comments as $comment)
        <tr>

            <td>{{ $comment->com }}</td>

            <td>
                <form action="{{ route('comments.destroy',$comment->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('comments.edit',$comment->id) }}">Edit</a>

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
