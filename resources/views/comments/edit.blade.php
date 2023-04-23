{{-- @extends('home')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit comment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('comments.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comments.update',$comment->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <input type="hidden" id="version" name="user_id" value="{{ $comment->user_id }}" />
                    <strong>Company com:</strong>
                    <input type="text" name="com" value="{{ $comment->com }}" class="form-control" placeholder="Company com">
                    @error('com')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
              <button type="submit" class="btn btn-primary ml-3">Submit</button>

        </div>

    </form>
@endsection
 --}}
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
                <h2 style="text-align: center;">Modifier le commentaire</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('comments.index') }}" enctype="multipart/form-data">Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Problème avec le commentaire.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="row" style="background: rgba(204, 204, 204, 0.5);padding-top: 0px; padding-bottom:0px;">
            <form action="{{ route('comments.update',$comment->id) }}" id="comment" name="comment" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="col-md-2" >

            </div>
            <div class="col-md-8" style="margin: 0%;width:100%"  >
                <div class="form-group">
                    <input type="hidden" id="version" name="user_id" value="{{ $comment->user_id }}" />
                    <strong>Commentaire :</strong>
                    <textarea type="text" id="com" name="com" form="comment" class="form-control" rows="5"  value="{{ $comment->com }}" class="form-control" placeholder="comment">{{ $comment->com }}</textarea>
                    @error('comment')
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
