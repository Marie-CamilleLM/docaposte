<?php

namespace App\Http\Controllers;

use App\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    public function index() {
        $materiels = Materiel::orderBy('nom', 'asc')->get();
        return view('materiel', compact("materiels"));
    }
    
    public function create() {
        $materiels = Materiel::all();
        return view('createMateriel', compact("materiels"));
    }
        
    public function store(Request $request) {		
	$this->validate($request, [
		'nom' => 'required',
		'prix' => 'required',
	]);
	$materiel = Materiel::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            
        ]);
        
	$materiel->clients()->attach($request->clientId);
	return back()->with("Success", "Matériel ajouté avec succès");
    }
    
    public function delete($id) {
        $materiel = Materiel::where('id', $id)->firstorfail()->delete();
        return back()->with('successDelete', 'Matériel supprimé avec succès !');
    }
}
