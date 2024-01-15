@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="text-center">Types Index</h1>
            <div>
                <a class="btn btn-primary" href="{{route('admin.types.create')}}">Crea Tipologia</a>
                <table class="table">
                    <thead>
                        <tr>                        
                            <th scope="col">Tipologia</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                        <tr>
                            <td>{{ $type->name}}</td>
                            <td><a class="btn btn-primary" href="{{route('admin.types.edit', $type)}}">Modifica</a></td>
                            <td>
                                <div class="text-center">        
        
                                    <button type="submit" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{$type->id}}">
                                        Elimina
                                    </button>
                                    
                                </div>
                                <div class="modal fade" id="staticBackdrop-{{$type->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Sei sicuro di voler eliminare questa Tipologia?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{$type->name}}
                                            </div>
                                            <form action="{{route('admin.types.destroy', $type->id)}}" method="POST">
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
                            </td>                            
                        </tr>                      
                        @endforeach                
                    </tbody>
                  </table>

            </div>
        </div>
        
    </section>


@endsection
