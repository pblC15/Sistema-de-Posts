@extends('layout.layout')

@section('title', "Editar Post" )

@section('content')

<h1>Editar Post</h1>
<div class="container">
   
    <div class="divForm">
        <form action="{{ route('edit.do', $postEdit->id)}}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
            <div class="form-group">
                <label for="idTitle">Título do Post</label>
                <input type="text" class="form-control" id="idTitutlo" name="title" value="{{ $postEdit->title }}">
            </div>

            <div class="form-group">
                <label for="idImage">Selecione a Imagem: </label>
                <input type="file" class="form-control-file" id="idImage" name="image" value="{{ old('image')}}">
            </div>
            
            <div class="form-group">
                <label for="idContent">Conteúdo do Post</label>
                <textarea class="form-control" id="idContent" name="content" rows="10" cols="15" >{{ $postEdit->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>


@endsection