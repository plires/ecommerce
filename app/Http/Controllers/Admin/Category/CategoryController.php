<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(15);
        return view('admin.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formValidated = $this->toValidate($request);
        
        if ($formValidated) {
            $category = new Category;
            $category->name = $request->input('name');
            $category->description = $request->input('description');

            if ($category->save()) {
                $message = 'La categoría '. $category->name .' fue agregado exitosamente.';
            } else {
                $message = 'Hubo un problema al agregar la categoría, intente nuevamente por favor.';
            }
            return redirect('admin/categories')->with('status', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Model Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show')->with(compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Model Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $formValidated = $this->toValidate($request);
        
        if ($formValidated) {
            $category->name = $request->input('name');
            $category->description = $request->input('description');

            if ($category->save()) {
                $message = 'La categoría '. $category->name .' fue editada exitosamente.';
            } else {
                $message = 'Hubo un problema al editar la categoría, intente nuevamente por favor.';
            }
            return redirect('admin/categories')->with('status', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Request $request)
    {
        if ($request->ajax()) {
            if ($category->delete()) {
                $message = 'La categoría <strong> '. $category->name .' </strong>fue borrada exitosamente.';
            } else {
                $message = 'Hubo un problema al eliminar el usuario, intente nuevamente mas tarde.';
            }
            return $message;
        }
    }

    public function toValidate($request)
    {
        $messages = [
            'name.required' => 'Ingrese el nombre de la categoría.',
            'name.min' => 'El nombre de la categoría debe tener mas de 3 caracteres.',
            'description.max' => 'El nombre de la categoría no puede tener mas de 190 caracteres.',
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'max:190',
        ];

        if ($this->validate($request, $rules, $messages)) {
            return true;
        }

    }
}
