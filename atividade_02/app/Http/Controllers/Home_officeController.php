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
        return view('home_offices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request-all());
        Home_office::create ($request->all());
        return redirect()->route('home_offices.create');
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
        return redirect()->route('home_offices.create');
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
