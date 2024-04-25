<?php
namespace App\Http\Controllers;
use App\Mail\envoyeemail;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserDBNotify;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function getAllfondateurs()
    {
        $fondateurs = User::where('type', 'fondateur')->get();
        return view('Layouts.fondateurs.ListFondateur',['fondateurs'=>$fondateurs]);
    }


    public function createAdmin()
    {
        return view('Layouts.sousAdmins.AjouterAdmin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'  => 'required|email',
            'type'   => 'required',
        ]);
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'L\'adresse e-mail existe déjà.']);
        }

        $password = Str::random(8);

        $user = User::create([
            'name'     => $request->name,
            'email'   => $request->email,
            'password' => Hash::make($password),
            'type'    => $request->type,
        ]);
        Mail::to($user->email)->send(new envoyeemail($user->email, $password));

        return redirect()->route('listAdmin')->with('success', 'Ajouté avec succès. Le mot de passe a été envoyé par email.');
    }
    public function getAllAdmin(){
        $user=User::where('type','sousAdministrateur')->get();
        return view('Layouts.sousAdmins.listAdmin',['user'=>$user]);
    }
    public function deleteAdmin($id)
    {
        try {
            $user = User::findOrFail($id);
            if ($user->type === 'sousAdministrateur') {
                $user->delete();
                return redirect()->route('listAdmin')->with('messageSuccess', 'Administrateur supprimé avec succès.');
            } else {
                return redirect()->route('listAdmin')->with('messageError', 'Opération invalide. Pas un administrateur.');
            }
        } catch (\Exception $e) {
            return redirect()->route('listAdmin')->with('messageError', 'Échec de la suppression du administrateur.');
        }
    }
    public function editMidifier($id){
        $user=User::find($id);
        return view('Layouts.sousAdmins.modifierAdmin',['user'=>$user]);
    }
    public function updateSousAdmin(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = Str::random(8);

        $user->update([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        Mail::to($user->email)->send(new envoyeemail($user->email, $password));

        return redirect()->route('listAdmin')->with('success', 'Modifié avec succès. Le mot de passe a été envoyé par email.');
    }






    public function show($id)
    {
        $fondateur = User::findOrFail($id);
        $startups = $fondateur->startups()->get();

        if($startups->isEmpty()) {
            $startups = null;
        }

        return view('Layouts.fondateurs.showfondateur', ['fondateur' => $fondateur, 'startups' => $startups]);
    }

    public function showinvest($id)
    {
        $investisseur = User::findOrFail($id);
        $secteursInteret = optional($investisseur->adminSecteur)->pluck('secteur->nom');

        return view('Layouts.investisseur.showinvestisseur', ['investisseur' => $investisseur,'secteursInteret' => $secteursInteret]);
    }
    public function getAllinvestisseur()
    {
        $investisseur=User::where('type','investisseur')->get();
        return view('Layouts.investisseur.Listinvestisseur',['investisseur'=>$investisseur]);
    }
    public function edit()
    {
        return view('Layouts.profil.Modifierprofil');
    }
    public function updateProfileAdmin(Request $request, string $id)
    {
        $admin = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'sometimes|required|mimes:jpg,png,jpeg',
        ]);

        // Récupérer les valeurs actuelles de l'utilisateur
        $currentName = $admin->name;
        $currentEmail = $admin->email;
        $currentImage = $admin->image;

        // Mettre à jour uniquement les champs qui ont été modifiés
        $admin->name = $request->name;
        $admin->email = $request->email;

        // Vérifier si une nouvelle image a été téléchargée
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = 'images/profile';
            $file->move($path, $filename);
            // Mettre à jour l'image uniquement si une nouvelle image a été téléchargée
            $admin->image = $filename;
        }

        // Sauvegarder les modifications
        $admin->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }


    public function deletefondateur($id)
    {
        try {
            $fondateur = User::findOrFail($id);
            if ($fondateur->type === 'fondateur') {
                $fondateur->delete();
                $operation = 'deleteFondateur';

                $utilisateursANotifier = User::where('id', '!=', Auth::id())->get();
                Notification::send($utilisateursANotifier, new UserDBNotify($fondateur,$operation));
                return redirect()->route('ListFondateur')->with('messageSuccess', 'Fondateur supprimé avec succès.');
            } else {
                return redirect()->route('ListFondateur')->with('messageError', 'Opération invalide. Pas un fondateur.');
            }
        } catch (\Exception $e) {
            return redirect()->route('ListFondateur')->with('messageError', 'Échec de la suppression du fondateur.');
        }
    }

    public function deleteinvestisseur($id)
    {
        try {
            $investissor = User::findOrFail($id);
            if ($investissor->type === 'investisseur') {
                $investissor->delete();
                $operation = 'deleteInvestisseur';

                $utilisateursANotifier = User::where('id', '!=', Auth::id())->get();
                Notification::send($utilisateursANotifier, new UserDBNotify($investissor,$operation));
                return redirect()->route('ListInvestisseur')->with('messageSuccess', 'Investisseur supprimé avec succès.');
            } else {
                return redirect()->route('ListInvestisseur')->with('messageError', 'Opération invalide. Pas un investisseur.');
            }
        } catch (\Exception $e) {
            return redirect()->route('ListInvestisseur')->with('messageError', 'Échec de la suppression de linvestisseur.');
        }
    }


}
