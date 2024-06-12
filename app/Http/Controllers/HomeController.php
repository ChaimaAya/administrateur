<?php

namespace App\Http\Controllers;

use App\Models\Secteur;
use App\Models\Startup;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $nbStartups = Startup::all()->count();
        $nbFondateurs = User::where('type', 'fondateur')->get()->count();
        $nbInvestisseur = User::where('type', 'investisseur')->get()->count();
        $nbSecteurs = Secteur::all()->count();
        $statistique = User::selectRaw('MONTH(created_at) as mois, YEAR(created_at) as année, COUNT(*) as nb, type')
            ->whereIn('type', ['investisseur', 'fondateur'])
            ->groupBy('mois', 'année', 'type')
            ->get();

        return view('Layouts.tableBord', ['nbStartups' => $nbStartups, 'nbFondateurs' => $nbFondateurs,
            'nbInvestisseur' => $nbInvestisseur, 'nbSecteurs' => $nbSecteurs, 'statistique' => $statistique,

        ]);
    }

}
