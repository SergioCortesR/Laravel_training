<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\category\PutRequest;
use App\Http\Requests\category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categorys = category::get();
        //Igual que el get te regresa lo que tiene el category en get pero con solo 2 registros
        $categories = Category::paginate(2);
        return view('dashboard.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "Este es el create del controlador";
        $category = new category();
        echo view('dashboard.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Category::create($request->validated());
        return to_route("category.index")->with('status',"Registro creado!");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //echo "Aqui se muestra el registro";
        return view("dashboard.category.show", compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        //
        echo view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, category $category)
    {

        $category->update($request->validated());
        return to_route("category.index")->with('status',"Registro actualizado!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //echo "Eliminar registro";
        $category->delete();
        return to_route("category.index")->with('status',"Registro eliminado!");
    }
}
