<?php
namespace App\Http\Controllers;
use App\Models\Startup;
use App\Notifications\StartupDBNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

use Illuminate\Http\Request;
class StartupController extends Controller
{
    public function getAllStartups()
    {
        $startups = Startup::with('user')->get();
        return view('layouts.startup.ListStartup',['startups'=>$startups]);
    }
    public function deleteStartup($id)
    {
        try {
            $startup = Startup::findOrFail($id);
            $startup->delete();
            $operation='deleteStartup';

            $utilisateursANotifier = User::where('id', '!=', Auth::id())->get();
            Notification::send($utilisateursANotifier, new StartupDBNotify($startup,$operation));
            return redirect()->route('ListStartup')->with('messageSuccess', 'La startup a été supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('messageError', 'Une erreur est survenue lors de la suppression de la startup : ' . $e->getMessage());
        }
    }
}
