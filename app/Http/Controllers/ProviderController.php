<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;


class ProviderController extends Controller
{
    public function __construct()
    {
    $this->middleware(['role:admin'])->only(['destroy']);
    }

    public function index(Request $request)
    {
        $query = trim($request->has('search')?$request->get('search'):"");
        $proveedores = Provider::where('name','LIKE','%'.$query.'%')->orderBy('id','asc')
        ->simplePaginate();
        return view('proveedores.index',compact("query","proveedores"));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'rfc' => ['required'],
            'email' => ['required','email'],
            'direccion' => ['required'],
            'telefono' => ['required'],
        ]);
        Provider::create($request->all());
        return redirect('/proveedores');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'rfc' => ['required'],
            'email' => ['required','email'],
            'direccion' => ['required'],
            'telefono' => ['required'],
        ]);
        $provider = Provider::findOrFail($id);
        $provider->update($request->all());
        return redirect('/proveedores');
    }

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete($id);
        return redirect()->route('proveedores.index');
    }

}
