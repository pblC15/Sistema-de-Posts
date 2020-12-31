@extends('layout.layout')

@section('title', 'GoolbeeNews')

@section('content')
    <h1>Sessão de Posts</h1>
    <!--Verificando se tem erro -->
    @if(session('message'))
        <div class="erro">
            <p>{{ session ('message')}}</p>
        </div>
    @endif
    @if(session('message'))
        <div class="erro">
            <p>{{ session ('mensagem')}}</p>
        </div>
    @endif
    @foreach($posts as $post) 
        <div class="conteudo">
            <div class="divImage">
                <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title}}" width="350" height="250"><!--Inserindo a imagem do banco -->
            </div>
            <div class="divTitle">
                    <div class="tituloEdrop">
                        <h3>{{ $post->title }}</h3>
                        <!--Dropdown de exclusão e edição do post -->
                        <div class="dropdown">
                            <button class="btn btn-secondary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="littleBall"></div>
                                <div class="littleBall"></div>
                                <div class="littleBall"></div>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('edit', $post->id)}}">Editar Post</a><!--Redfireciona para a página de edição -->
                                <a class="dropdown-item">
                                    <!--Exclui o post -->
                                    <form action="{{ route('destroy', $post->id)}}" method="post">
                                        @csrf
                                        @METHOD('DELETE')
                                        <button type="submit" class="btm-Excluir">Excluir Post</button>
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                
            <h6>Data da Postagem: {{ $post->created_at->format('d/m/Y - H:i:s')}}</h6><!--Formatando a data e exibindo-->
            <p>{{ $post->content}}</p><!--Insere o conteudo do post -->
            </div>
        </div>
    @endforeach    
    <!--Paginação -->
    <div class="paginate">

    @if(isset($filters))

        {{ $posts->appends('$filters')->links() }}
    
    @else
    
        {{ $posts->links() }}
    
    @endif
      
    </div>
@endsection

