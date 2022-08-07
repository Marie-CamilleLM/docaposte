<?php

namespace App\Http\Controllers;

use DB;
use App\Client;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{

    public function index() {
        $clients = DB::table('client_materiel as lien')
                ->select('client.nom as nomClient', 'client.prenom as prenom', 'materiel.nom as nomMateriel', DB::raw('sum(materiel.prix) as prix'), DB::raw('count(lien.client_id) as nombre'))
                ->join('materiels as materiel', 'materiel.id', '=', 'lien.materiel_id')
                ->join('clients as client', 'client.id', '=', 'lien.client_id')
                ->where('prix', '>=', '30000')
                ->groupBy('nomClient','prenom', 'nomMateriel')
                ->get();
        return view('welcome', compact("clients"));
    }
}
