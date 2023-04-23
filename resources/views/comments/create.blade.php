@extends('header')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Commentaire</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('comments.index') }}"> Retour</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
        
    <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Commentaire:</strong>
                <textarea class="form-control" style="height:280px" name="com" placeholder="Description"></textarea>
            </div>
        </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div> 
    </form>
@endsection