<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    // Listes tous les employés
    public function index()
    {
        $employes = Employe::all();
        return response()->json($employes);
    }

     // Créer un nouvel employé
     public function store(Request $request)
     {
         $data = $request->validate([
             'nom' => 'required|string|max:255',
             'prenom' => 'required|string|max:255',
             'date_naissance' => 'required|date',
             'adresse' => 'required|string|max:255',
             'email' => 'required|string|email|max:255',
             'telephone' => 'required|string|max:255',
             'cin' => 'required|string|max:255',
             'departement_id' => 'required|exists:departements,id',
         ]);
 
         $employe = Employe::create($data);
 
         return response()->json([
            'message' => 'Employé créé avec succès !',
            'employe' => $employe
        ], 201);
     }

     // Récupérer un employé par son ID
    public function show($id)
    {
        try{
            $employe = Employe::findOrFail($id);
            return response()->json($employe);
        }catch(ModelNotFoundException $e){
            return response()->json([
                'message' => 'Employé non trouvé'], 404);
        }
    }

    // Mettre à jour un employé existant
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telephone' => 'required|string|max:255',
            'cin' => 'required|string|max:255',
            'departement_id' => 'required|exists:departements,id',
        ]);

        $employe = Employe::findOrFail($id);
        $employe->update($request->all());

        return response()->json($employe);
    }

     // Supprimer un employé
     public function destroy($id)
     {
        try{
            $employe = Employe::findOrFail($id);
            $employe->delete(); 
            return response()->json(['message' => 'Employé supprimer avec succé'], 204);
        }catch(ModelNotFoundException $e){
            return response()->json(['message' => 'Employé non trouvé']);
        }
         
     }
}
