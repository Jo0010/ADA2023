@extends('header')
@section('content')
<div class="row">
    <div class="col-sm-2">
    </div>

    <div class="col-sm-8" style="background: rgba(204, 204, 204, 0.5);padding:5%;width:100%;">

        <h3 style="text-align: center">Galeries de nos réalisations</h3>
    </div>
    <div class="col-sm-2">
    </div>
</div>
	@foreach ($projects as $project)
    <div class="row">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8" style="background: rgba(204, 204, 204, 0.5);padding:5%;width:100%;">
		<!-- Carousel -->
		<div id="demo{{$project->id}}" class="carousel slide" data-bs-ride="carousel" style="width:70%;display: block; margin-left: auto; margin-right: auto;">

			<!-- The slideshow/carousel -->
			<div class="carousel-inner">
                @php($cpt = 0)
				@foreach($images as $image)
                @if ($image->project_id==$project->id)
                        @if ($cpt == 0)
                            <div class="carousel-item active">
                                @role('Super-Admin')
                                <figure>
                                @endrole
                                <img src="<?php echo $image->path; ?>" alt="photo" class="d-block w-100"/>
                                @role('Super-Admin')
                                <figcaption>{{$image->name}}</figcaption>
                                </figure>
                                @endrole
                            </div>
                            @php($cpt++)
                        @else
                            <div class="carousel-item">
                                @role('Super-Admin')
                                <figure>
                                @endrole
                                <img src="<?php echo $image->path; ?>" alt="photo" class="d-block w-100"/>
                                @role('Super-Admin')
                                <figcaption>{{$image->name}}</figcaption>
                                </figure>
                                @endrole
                            </div>
                            @php($cpt++)
                        @endif
                @endif
				@endforeach
			</div>
				<!-- Left and right controls/icons -->
				<button class="carousel-control-prev" type="button" data-bs-target="#demo{{$project->id}}" data-bs-slide="prev">
				<span class="carousel-control-prev-icon"></span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#demo{{$project->id}}" data-bs-slide="next">
				<span class="carousel-control-next-icon"></span>
				</button>
		</div>
        </div>
        <div class="col-sm-2">
        </div>
    </div>


	@role('Super-Admin')
		<!-- Container (Contact Section) -->
    <div class="row" style="background: rgba(204, 204, 204, 0.5); padding:0% 5% 5% 5%;">
        <div class="col-sm-2">

        </div>
        <div class="col-sm-4">

                <!--Upload image-->
                <form method="POST" action="{{ route('image.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label for="image">Ajouter une image:</label>
                    <input style="margin:0px;" type="file" class="form-control" name="image" />
        </div>
        <div class="col-sm-4">
        <br>
                    <input type="hidden" id="version" name="project_id" value="{{ $project->id }}" />
                    <button type="submit" class="btn btn-secondary">Ajouter</button>
                </form>
        </div>
        <div class="col-sm-2" >

        </div>
    </div>
        <div class="row"style="background: rgba(204, 204, 204, 0.5); border-bottom:solid gray 2px; padding:0% 5% 5% 5%;">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-8" ">
                <!--Delete image-->
                <form action="{{ route('images.destroy',$image->id)  }}" method="POST">
                    <label for="id">Choose a image:</label>
                    <select id="id" name="id">
                        @foreach ($images->where('project_id', $project->id) as $image)
                        <option value="{{ $image->id }}">{{ $image->name }}</option>
                        @endforeach
                    </select>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer l'image</button>
                </form>
            </div>
        <div class="col-sm-2" >
        </div>
    </div>
	    @endrole
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8" style="background: rgba(204, 204, 204, 0.5);padding:5%;width:100%;">
        {{$project->description}}
    </div>
    <div class="col-sm-2">
    </div>
</div>
@role('Super-Admin')
<div class="row" style="background: rgba(204, 204, 204, 0.5); border-bottom:solid gray 2px; padding:10px;">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-2">
    <!--Edit project-->
    <a class="btn btn-secondary" href="{{ route('projects.edit',$project->id) }}">Modifier</a>
    </div>
    <div class="col-sm-2" >
    <!--Delete project-->
    <form action="{{ route('projects.destroy',$project->id)  }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer le project</button>
    </form>
    </div>
    <div class="col-sm-4">
    </div>
</div>
    @endrole
    @endforeach
    @role('Super-Admin')
    <!--Create project -->
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8" style="background: rgba(204, 204, 204, 0.5);padding:5%;width:100%;">
        <h5>Créer un nouveau projet:</h5>
        <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="desc">Description du projet:</label>
            <textarea class="form-control" rows="5" id="desc" name="description"></textarea>
            <br>
            <button type="submit" class="btn btn-secondary">Nouveau project</button>
        </form>
    </div>
    <div class="col-sm-2">
    </div>
</div>
    @endrole

@endsection
