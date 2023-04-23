@extends('home')
<style>
    body{
    background-image: url('/image/wallpaper.jpg');
                background-position:center;
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: cover;
          min-height: 100%;
          font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

}
</style>
@section('content')

    <div class="row" style="background: rgba(204, 204, 204, 0.5);padding:5%;">
        <div class="col-lg-12 margin-tb" >
            <div class="pull-left">
                <h2 style="text-align: center;">Modifier la description</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('projects.index') }}" enctype="multipart/form-data"> Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Problème avec la description.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row" style="background: rgba(204, 204, 204, 0.5);padding-top: 0px; padding-bottom:0px;">
            <form action="{{ route('projects.update',$project->id) }}" id="description" name="description" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="col-md-2" >

            </div>
            <div class="col-md-8" style="margin: 0%;width:100%"  >
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea type="text" id="description" name="description" form="description" class="form-control" rows="5"  value="{{ $project->description }}" class="form-control" placeholder="Description">{{ $project->description }}</textarea>
                    @error('description')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2" >

            </div>
        </div>
        <div class="row" style="background: rgba(204, 204, 204, 0.5);padding:5%;">
            <div class="col-sm-2" >
            </div>
            <div class="col-sm-8" >
            </div>
            <div class="col-sm-2" >
                <button type="submit" class="btn btn-secondary" style="float: right;">Valider</button>
            </div>
        </div>


    </form>
@endsection
