<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\post\PutRequest;
use App\Http\Requests\post\StoreRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Post::get());
    }

    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }
    public function show(Post $post)
    {
        return response()->json($post);
    }
    public function update(PutRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json("Registro eliminado");
    }
}
