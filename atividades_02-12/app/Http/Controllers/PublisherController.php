<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    public function index()
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }
        
        $publishers = Publisher::all();
        return view ('publishers.index', compact('publishers'));
    }

    public function create()
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }
        
        return view ('publishers.create');
    }


    public function store(Request $request)
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255|unique:publishers,name',
            'address' => 'nullable|string|max:255',
        ]);
        Publisher::create($request->all());
        return redirect()->route('publishers.index')->with('success', 'Publicação cadastrada com sucesso.');
    }

    public function show(Publisher $publisher)
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }
        
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }
        
        return view('publishers.edit', compact('publisher'));

    }

    public function update(Request $request, Publisher $publisher)
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255|unique:publishers,name,'.$publisher->id,
            'address' => 'nullable|string|max:255',
        ]);
        $publisher->update($request->all());
        return redirect()->route('publishers.index')->with('success', 'Publicação atualizada com sucesso.');
    }

    public function destroy(Publisher $publisher)
    {
        if (! in_array(auth()->user()->role, ['admin', 'librarian'])) {
            abort(403, 'Acesso não autorizado. Apenas funcionários.');
        }
        
        $publisher->delete();

        return redirect()->route('publishers.index')->with('success', 'Publicação excluida:'.' '.$publisher->name);

    }
}
