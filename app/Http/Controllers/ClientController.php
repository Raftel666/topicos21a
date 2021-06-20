<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
    $this->middleware(['role:admin'])->only(['destroy']);
    }

    public function index(Request $request)
    {
        $query = trim($request->has('search')?$request->get('search'):"");
        $clientes = Client::where('name','LIKE','%'.$query.'%')->orderBy('id','asc')
        ->simplePaginate();
        return view('clientes.index',compact("query","clientes"));
    }

    public function create()
    {
        return view('clientes.create');
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
        Client::create($request->all());
        return redirect('/clientes');
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
        $client = Client::findOrFail($id);
        $client->update($request->all());
        return redirect('/clientes');
    }

    public function destroy($id)
    {
        $client = client::findOrFail($id);
        $client->delete($id);
        return redirect()->route('clientes.index');
    }

}
