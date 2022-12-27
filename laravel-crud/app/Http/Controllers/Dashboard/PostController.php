<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\post\PutRequest;
use App\Http\Requests\post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::get();
        //Igual que el get te regresa lo que tiene el post en get pero con solo 2 registros
        $posts = Post::paginate(2);
        return view('dashboard.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "Este es el create del controlador";
        $categories = Category::pluck('id', 'title');
        $post = new Post();

        //dd($categories);
        echo view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //$validated = Validator::make($request->all(),StoreRequest::myRules());

        /* $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        dump($data); */

        Post::create($request->validated());
        return to_route("post.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //echo "Aqui se muestra el registro";
        return view("dashboard.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        //echo "Este es el create del controlador";
        $categories = Category::pluck('id', 'title');
        //dd($categories);
        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();

        if(isset($data["image"])){
            $data["image"] = $filename = time().".".$data["image"]->extension();
            $request->image->move(public_path("image"), $filename);
        }

        $post->update($data);
        //$request->session()->flash('status',"Registro actualizado!");
        return to_route("post.index")->with('status',"Registro actualizado!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //echo "Eliminar registro";
        $post->delete();
        return to_route("post.index");
    }
}
