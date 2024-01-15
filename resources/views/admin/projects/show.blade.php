@extends('layouts.app')

@section('content')
   
    <section class="container text-center">
        <h1>Projects Show</h1>
        <img class="w-50" src="{{$project->image}}" alt="">
        <ul>
            @foreach ($project->technologies as $technology)
                <li class="badge rounded-pill text-bg-danger">{{$technology->name}}</li>
            @endforeach

        </ul>
        <h1>{{$project->title}}</h1>
        <p>{{$project->description}}</p>
        <p>{{ optional($project->type)->name}}</p>

    </section>
    <div class="text-center mb-2">
        <a class="text-light text-decoration-none btn btn-primary" href="{{route('admin.projects.index')}}">I miei Progetti</a>
    
    </div>   
    <div class="text-center">        
        
        <button type="submit" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$project->id}}">
            Elimina
        </button>
        <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-success">Modifica</a>
    </div>
    <div class="modal fade" id="staticBackdrop-{{$project->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Sei sicuro di voler eliminare il Progetto?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$project->title}}
                </div>
                <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <input class="btn btn-danger" type="submit" value="Elimina">                
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>            
    
   
@endsection