<?php

namespace App\Http\Controllers;

use App\Models\Poi;
use Illuminate\Http\Request;

class PoiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = Poi::distinct()->pluck('category');
        return view("dashboard.createPoi", ["categorie" => $categorie]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "category" => "required",
            "latitude" => "required|numeric",
            "longitude" => "required|numeric",
        ]);

        $location = json_encode([
            'latitude' => $validatedData['latitude'],
            'longitude' => $validatedData['longitude'],
        ]);

        Poi::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category' => $validatedData['category'],
            'location' => $location,
        ]);

        session()->flash("success", "Poi creato con succeso");
        return redirect("/");
    }


    /**
     * Display the specified resource.
     */
    public function show(Poi $poi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poi $poi)
    {
        $categorie = Poi::distinct()->pluck('category');
        return view("dashboard.poiEdit", ["poi" => $poi, "categorie" => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poi $poi)
    {
        $validated = $request->validate([
            "title" => "required",
            "description" => "required",
            'category' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Crea il JSON per location
        $location = json_encode([
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
        ]);

        // Aggiorna i campi
        $poi->title = $validated['title'];
        $poi->description = $validated['description'] ?? '';
        $poi->category = $validated['category'];
        $poi->location = $location;

        $poi->save();
        session()->flash('success', 'POI modificato con successo');
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poi $poi)
    {
        $poi->delete();
        session()->flash('success', 'POI eliminato con successo');
        return redirect("/");
    }
}
