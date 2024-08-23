<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Alimentazione;
use Illuminate\Support\Facades\Auth;

class AlimentazioneController extends Controller
{
    use ApiResponser;

    public function store(Request $request) {
        $alimentazione =  new Alimentazione();
        $alimentazione->user_id = Auth::user()->id;
        $alimentazione->farm_id = Auth::user()->farm_id;
        $alimentazione->alimenti_id = $request->alimenti;
        $alimentazione->stella_id = $request->stella;
        $alimentazione->data = $request->data;
        $alimentazione->quantita = $request->quantita;
        $alimentazione->motivazione = $request->motivazione;
        $alimentazione->save();

        $alimentazioneObj = Alimentazione::where('id', $alimentazione->id)->with('stella')->with('alimenti')->first();
        return $this->success($alimentazioneObj , 'Record Save successfully.', 201);
    }
}
