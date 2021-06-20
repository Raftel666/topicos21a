<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class SalesController extends Controller
{
    public function __construct()
    {
    $this->middleware(['role:admin'])->only(['destroy']);
    }
    
    public function index(Request $request)
    {
        $query = trim($request->has('search')?$request->get('search'):"");
        $ventas = Sales::where('name','LIKE','%'.$query.'%')->orderBy('id','asc')
        ->simplePaginate();
        return view('ventas.index',compact("query","ventas"));
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'descripcion' => ['required'],
            'metodoPago' => ['required'],
            'cantidad' => ['required'],
            'total' => ['required'],
        ]);
        Sales::create($request->all());
        return redirect('/ventas');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'descripcion' => ['required'],
            'metodoPago' => ['required'],
            'cantidad' => ['required'],
            'total' => ['required'],
        ]);
        $sale = Sales::findOrFail($id);
        $sale->update($request->all());
        return redirect('/ventas');
    }

    public function destroy($id)
    {
        $sale = Sales::findOrFail($id);
        $sale->delete($id);
        return redirect()->route('ventas.index');
    }


}
