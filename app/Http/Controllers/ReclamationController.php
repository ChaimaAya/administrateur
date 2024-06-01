<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;

class ReclamationController extends Controller
{
    public function getAllReclamations()
    {
        $reclamations = Reclamation::all();
        return view('Layouts.reclamation.listReclamation', ['reclamations' => $reclamations]);
    }
    public function showReclamation($id)
    {
        $reclamation = Reclamation::find($id);
        return view('Layouts.reclamation.showReclamation', ['reclamation' => $reclamation]);
    }

    public function accepter($id)
    {
        $reclamation = Reclamation::findOrFail($id);

        if ($reclamation->statut === 'en_attente') {
            $reclamation->statut = 'en_traitement';

            $reclamation->save();

            return redirect()->route('listreclamation')->with('success', 'La réclamation a été acceptée et est maintenant en cours de traitement.');
        } else {
            return redirect()->route('listreclamation')->with('error', 'Impossible d\'accepter cette réclamation car elle n\'est pas en attente.');
        }
    }

    public function refuser($id)
    {
        $reclamation = Reclamation::findOrFail($id);

        if ($reclamation->statut === 'en_attente') {
            $reclamation->statut = 'fermee';

            $reclamation->save();

            return redirect()->route('listreclamation')->with('success', 'La réclamation a été refusée.');
        } else {
            return redirect()->route('listreclamation')->with('error', 'Impossible de refuser cette réclamation car elle n\'est pas en attente.');
        }
    }
    public function supprimer($id)
    {
        try {
            $reclamation = Reclamation::findOrFail($id);

            $reclamation->delete();

            return redirect()->route('listreclamation')->with('success', 'La réclamation a été supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('listreclamation')->with('error', 'Une erreur s\'est produite lors de la suppression de la réclamation.');
        }
    }
    public function resoudre($id)
    {
        $reclamation = Reclamation::findOrFail($id);

        if ($reclamation->statut === 'en_traitement') {
            $reclamation->statut = 'resolue';

            $reclamation->save();

            return redirect()->route('listreclamation')->with('success', 'La réclamation a été marquée comme résolue.');
        } else {
            return redirect()->route('listreclamation')->with('error', 'Impossible de marquer cette réclamation comme résolue car elle n\'est pas en cours de traitement.');
        }
    }
}
