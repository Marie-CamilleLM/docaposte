<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::orderBy('nom', 'asc')->get();
        return view('client', compact("clients"));
    }
    
    public function create() {
        $clients = Client::all();
        return view('createClient', compact("clients"));
    }
        
    public function edite($id) {
        $clients = Client::where('id', $id)->firstorfail();
        return view('editeClient', compact("clients"));
    }
        
    public function store(Request $request) {		
	$this->validate($request, [
		'nom' => 'required',
		'prenom' => 'required',
	]);
	$client = Client::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            
        ]);
        
	$client->materiels()->attach($request->materielId);
	return back()->with("Success", "Client ajouté avec succès");
    }
    
    public function update(Request $request, Client $client) {		
	$this->validate($request, [
		'nom' => 'required',
		'prenom' => 'required',
	]);
	$client->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            
        ]);
        
	$client->materiels()->attach($request->materielId);
	return back()->with("Success", "Client modifié avec succès");
    }
    
    public function delete($id) {
        $client = Client::where('id', $id)->firstorfail()->delete();
        return back()->with('successDelete', 'Client supprimé avec succès !');
    }

}
