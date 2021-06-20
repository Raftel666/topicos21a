<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
    $this->middleware(['role:admin'])->only(['destroy']);
    }
    
    public function index(Request $request)
    {
        $query = trim($request->has('search')?$request->get('search'):"");
        $productos = Product::where('name','LIKE','%'.$query.'%')->orderBy('id','asc')
        ->simplePaginate();
        return view('productos.index',compact("query","productos"));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'descripcion' => ['required'],
            'cantidad' => ['required'],
            'precio' => ['required'],
        ]);
        Product::create($request->all());
        return redirect('/productos');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'descripcion' => ['required'],
            'cantidad' => ['required'],
            'cantidad' => ['required'],
        ]);
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('/productos');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete($id);
        return redirect()->route('productos.index');
    }


}
