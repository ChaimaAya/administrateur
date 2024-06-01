<?php

namespace App\Http\Controllers;

use App\Events\SecteurEvent;
use App\Models\Secteur;
use App\Models\User;
use App\Notifications\SecteurDBNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secteurs = Secteur::all();
        return view('Layouts.secteur.ListSecteur', ['secteurs' => $secteurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Layouts.secteur.AjouteSecteur');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->nom);
        $nom = $request->nom;

        $request->validate([
            'nom' => 'required',

        ]);
        $secteur = Secteur::create([
            'nom' => $request->nom,
        ]);
        $data = [
            'nom' => $nom,

        ];
        $operation = 'create';

        $utilisateursANotifier = User::where('id', '!=', Auth::id())->get();
        $secteurs = Secteur::latest()->first();
        // event(new SecteurEvent($secteur, 'create'));

        Notification::send($utilisateursANotifier, new SecteurDBNotify($secteurs, $operation));
        return redirect()->route('ListSecteur')->with('success', 'ajouter avec succès');
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
    public function edit($id)
    {
        $secteurs = Secteur::find($id);
        // dd($secteurs);
        return view('Layouts.secteur.ModifierSecteur', ['secteurs' => $secteurs]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $secteurs = Secteur::find($id);
        $nom = $request->nom;

        $request->validate([
            'nom' => 'required',

        ]);
        $secteurs->update([
            'nom' => $nom,
        ]);
        $operation = 'update';

        $utilisateursANotifier = User::where('id', '!=', Auth::id())->get();
        event(new SecteurEvent($secteurs, 'update'));

        Notification::send($utilisateursANotifier, new SecteurDBNotify($secteurs, $operation));
        return redirect()->route('ListSecteur')->with('success', 'modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $secteurs = Secteur::find($id);
        if ($secteurs) {
            $secteurs->delete();

            $operation = 'delete';

            $utilisateursANotifier = User::where('id', '!=', Auth::id())->get();
            // event(new SecteurEvent($secteurs, 'delete'));

            Notification::send($utilisateursANotifier, new SecteurDBNotify($secteurs, $operation));
            return redirect()->route('ListSecteur')->with('success', 'supprimer avec succès');
        } else {
            return redirect()->route('ListSecteur')->with('error', 'Le secteur que vous essayez de supprimer n\'existe pas.');
        }

    }

}
