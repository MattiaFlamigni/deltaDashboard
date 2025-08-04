<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->isAdmin) {
            $users = User::paginate();
            return view('admin.users', ["data" => $users]);
        }
        abort(403, 'Accesso negato');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->isAdmin) {
            return view('auth.register');
        }
        abort(403, 'Accesso negato');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Se il checkbox è selezionato, vale true, altrimenti false
        $isAdmin = $request->has('isAdmin');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|unique:admin_users',
            'password' => 'required|string|min:8',
            'isAdmin' => 'boolean',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'isAdmin' => $isAdmin,
        ]);

        return redirect()->back()->with('success', 'Utente registrato con successo.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(Auth::user()->isAdmin) {
            $user->delete();
            session()->flash('success', 'Utente eliminato con successo.');
            return redirect("/dashboard/admin");
        }
        abort(403, 'Accesso negato');
    }
}
