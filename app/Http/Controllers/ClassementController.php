<?php

namespace App\Http\Controllers;

use DB;
use App\Client;
use Illuminate\Http\Request;

class ClassementController extends Controller
{    
    public function index() {
        $clients = DB::table('client_materiel as lien')
                ->select('client.nom as nom', 'client.prenom as prenom', DB::raw('sum(materiel.prix) as prix'))
                ->join('clients as client', 'client.id', '=', 'lien.client_id')
                ->join('materiels as materiel', 'materiel.id', '=', 'lien.materiel_id')
                ->groupBy('nom', 'prenom')
                ->orderBy('prix', 'desc')
                ->get();
        return view('classement', compact("clients"));
    }
}
