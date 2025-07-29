<?php

namespace App\Http\Controllers;

use App\Models\categorie_animali;
use App\Models\Spotted;
use Illuminate\Http\Request;

class SpottedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spotted = Spotted::orderBy("data", "desc")->paginate(10);
        return view("spotted.spotted", ["data"=>$spotted]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Spotted $spotted)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spotted $spotted)
    {
        $categorie = categorie_animali::all();
        $subcategory = Spotted::distinct()->pluck("subCategory");
        return view("spotted.editSpot", ["spotted"=>$spotted, "categorie"=>$categorie, "subCategory"=>$subcategory]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spotted $spotted)
    {
        $validatedData = $request->validate([
            "category" => "required",
            "subCategory"=>"required"
        ]);
        $spotted->update($request->all());
        session()->flash('success', 'Curiosità creata con successo');
        return redirect("/spotted");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spotted $spotted)
    {
        $spotted->delete();
        session()->flash('success', 'Spotted eliminata con successo');
        return redirect("/spotted");
    }
}
