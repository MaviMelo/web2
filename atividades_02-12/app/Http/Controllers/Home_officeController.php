<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Home_office;

class Home_officeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home_offices = Home_office::all();
        return view('home_offices.index', compact('home_offices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_object = null;

        if (session()->has('last_data')){
            $data_json = session('last_data');
            $id = (int) $data_json['id'];     // or   intval($data_json['id'])
            $data_object = Home_office::find($id);

            session()->forget('last_data');

            # Depuração:
            /*
            echo "Último registro adicionado: " . $data_json['id']. ";" . " Nome: {$data_json['collaborator'] }";
            dd ($data_object);
            */
        }
            return view('home_offices.create', compact('data_object'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $home_office = Home_office::create ($request->all());
        // $lastId = Home_office::latest()->first();

        $sessionData = [
            'id' => $home_office->id,
            'collaborator' => $home_office->collaborator
        ];

        return redirect()->route('home_offices.create')->with('last_data', $sessionData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Home_office $home_office)
    {
        return view('home_offices.show', compact('home_office'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home_office $home_office)
    {
        return view('home_offices.edit', compact('home_office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home_office $home_office)
    {
        $home_office -> update($request->all());
        return redirect()->route('home_offices.show', compact('home_office'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home_office $home_office)
    {
        $home_office->delete();
        return redirect()->route('home_offices.index');
    }
}
