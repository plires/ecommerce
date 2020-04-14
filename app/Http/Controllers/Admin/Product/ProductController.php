<?php

namespace App\Http\Controllers\Admin\Product;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);
        // dd($products);
        return view('admin.products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create')->with(compact('categories'));
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
            $product = new Product;
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->long_description = $request->input('long_description');
            $product->price = $request->input('price');
            $product->category_id = $request->input('category');

            if ($product->save()) {
                $message = 'El Producto '. $product->name .' fue agregado exitosamente.';
            } else {
                $message = 'Hubo un problema al agregar el producto, intente nuevamente por favor.';
            }
            return redirect('admin/products')->with('status', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Model Product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show')->with(compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit')->with(compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Model Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $formValidated = $this->toValidate($request);
        
        if ($formValidated) {
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->long_description = $request->input('long_description');
            $product->price = $request->input('price');
            $product->category_id = $request->input('category');

            if ($product->save()) {
                $message = 'El Producto '. $product->name .' fue editado exitosamente.';
            } else {
                $message = 'Hubo un problema al editar el producto, intente nuevamente por favor.';
            }
            return redirect('admin/products')->with('status', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Request $request)
    {
        if ($request->ajax()) {
            if ($product->delete()) {
                $message = 'El Producto <strong> '. $product->name .' </strong>fue borrado.';
            } else {
                $message = 'Hubo un problema al eliminar la categoria, intente nuevamente mas tarde.';
            }
            return $message;
        }
    }

    public function toValidate($request)
    {
        $messages = [
            'name.required' => 'Ingrese el nombre del producto.',
            'name.min' => 'El nombre del producto debe tener mas de 3 caracteres.',
            'description.required' => 'Ingrese la descripción del producto.',
            'description.max' => 'La descripción del producto no puede superar los 190 caracteres.',
            'price.required' => 'Ingrese el precio del producto.',
            'price.numeric' => 'El precio del producto debe ser un valor numérico.',
            'price.min' => 'El precio del producto debe ser un valor positivo.',
        ];
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:190',
            'price' => 'required|numeric|min:0',
        ];

        if ($this->validate($request, $rules, $messages)) {
            return true;
        }

    }
}
