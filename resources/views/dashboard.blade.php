<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion de votre commentaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <a type="button" href="/users">users</a>
                    <a type="button" href="/comments">commentaire</a>
                    <a type="button" href="/gallery">galerie</a>
                    @role('user')
                    <a type="button" href="/gallery">test</a>

                    @endrole
                    {{--  @foreach (Auth::user()->comment as $comment)
                    <form action="{{ route('comments.update',$comment->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
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
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
