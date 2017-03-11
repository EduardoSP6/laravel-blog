<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;

class PostsAdminController extends Controller
{

    private $post;
    // injeta a dependencia criando um novo post no metodo contrutor
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        // obtem lista de posts com paginação de 5 registros por pagina
        $posts = $this->post->paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Requests\PostRequest $request)
    {

       // cria novo post no bd
       $post = $this->post->create($request->all());

       // grava as tags do vetor no bd relacionando com o post criado. Se as tags nao existirem, remove-se a relacao
       $post->tags()->sync($this->getTagsIds($request->tags));

       return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, Requests\PostRequest $request)
    {
        $this->post->find($id)->update($request->all());
        $post = $this->post->find($id);
        $post->tags()->sync($this->getTagsIds($request->tags));

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getTagsIds($tags)
    {
        // monta um array de tags
        $tagsList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];

        // percorre o array de tags e grava no tagsIDs os codigos das tags encontradas no bd
        // se nao encontrar, cria uma nova tag e obtem seu id
        foreach ($tagsList as $tagName)
        {
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagsIDs;
    }
}
