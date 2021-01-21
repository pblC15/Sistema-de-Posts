<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StoreUpdatePost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    //Exibe os registros na tela
    public function index(){
   
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        //$posts = Post::latest()->paginate();

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }
    
    public function create(){

        return view('admin.posts.createPost');
    }

    //Cadastrando os dados no banco
    public function store(StoreUpdatePost $request){

        $data = $request->all();

        if($request->image->isValid()){

            $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension();

            $image = $request->image->storeAs('postsImage', $nameFile);
            $data['image'] = $image;
        }

        $post = Post::create($data);

        //$post = Post::create($request->all());//Salva no banco com apenas essa linha

        return redirect()->route('index');//Redireciona para a página principal

    }

    //Edição do post
    public function edit($id){

        if(!$postEdit = Post::find($id)){
            
            return redirect()->route('index');
        }

        $postEdit = Post::where("id", $id)->first();
        //$postEdit = Post::find('id');//Procura no banco passando o id

        return view("admin.posts.editPost", compact('postEdit'));
    }

    //Cadastra a edição no banco
    public function update(Request $request, $id){
        
        if(!$post = Post::find($id)){
            
            return redirect()->route('index')->with('message', 'Post não existe no Banco de dados!');
        }        
        //Modo enxuto

        $post->update($request->all());

        //Modo robusto
        // Post::where('id', $id)->update([
        //     'id'=>$request->id,
        //     'title'=>$request->title,
        //     'content'=>$request->content
        // ]);

        return redirect()->route('index')->with('message', 'Post Editado com sucesso!');
    }
    //Deleta o registro
    public function destroy($id){

        if(!$post = Post::find($id)){

            return redirect()->route('index');
        }
        $post->delete();

        return redirect()->route('index')->with('message', "Post excluido com sucesso!");
    }

    //Procurar registros
    public function search(Request $request){

        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                ->orWhere('content', 'LIKE', "%{$request->search}%")
                ->paginate(5);
       
        return view('admin.posts.index', compact('posts', 'filters'));
            
    }   
}
