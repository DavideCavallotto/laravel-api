@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center">


    <form action="{{route('admin.types.update', $type)}}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="name" class="form-label">Tipologia</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Modifica Tipologia" value="{{old('name', $type->name)}}">
        </div>     
        
        
       
        <div class="text-center my-3">
            <input type="submit" class="btn btn-primary" value="Modifica">
        </div>
        
    
    </form>
</div>
<div class="text-center">
    <a class="btn btn-primary" href="{{route('admin.types.index')}}">Torna ai progetti</a>

</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif       
    
@endsection