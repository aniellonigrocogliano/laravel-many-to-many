<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {

        $technology = Technology::all();
        return view('admin.technologies.index', compact('technology'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.technologies.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $data = $request->all();
        $technology = new Technology();
        $technology->fill($data);
        $technology->save();

        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia aggiunta con successo.');
    }

    // Display the specified resource.
    public function show(Technology $technology)
    {
        return view('technologies.show', compact('technology'));
    }

    // Show the form for editing the specified resource.
    public function edit(Technology $technology)
    {
        return view('technologies.edit', compact('technology'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Technology $technology)
    {
        $request->validate([
            'name' => 'required|unique:technologies,name,' . $technology->id . '|max:255',
        ]);

        $technology->name = $request->name;
        $technology->save();

        return redirect()->route('technologies.index')->with('success', 'Tecnologia aggiornata con successo.');
    }

    // Remove the specified resource from storage.
    public function destroy(Technology $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia eliminata con successo.');
    }
}
