<?php

namespace App\Http\Controllers;

use App\Models\Curiosity;
use Illuminate\Http\Request;

class CuriosityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curiosity = Curiosity::paginate(10);
        return view('curiosity.curiosity', ["curiosity"=> $curiosity]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curiosity $curiosity)
    {
        return view("curiosity.editCuriosity", ["cur"=>$curiosity]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curiosity $curiosity)
    {
        $data = [
            "title" => $request->title,
            "subtitle" => $request->subtitle,
            "description" => $request->description,
        ];
        $curiosity->update($data);
        session()->flash('success', 'Curiosità aggiornata con successo');
        return redirect("/curiosity");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Curiosity::destroy($id);

        session()->flash('success', 'Curiosità eliminata con successo');
        return redirect('/curiosity');
    }
}
