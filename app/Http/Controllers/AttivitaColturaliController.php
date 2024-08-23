<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\AttivitaColturali;
use Illuminate\Support\Facades\Auth;

class AttivitaColturaliController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {
        $attivitaColturali =  new AttivitaColturali();
        $attivitaColturali->user_id = Auth::user()->id;
        $attivitaColturali->farm_id = Auth::user()->farm_id;
        $attivitaColturali->inizio = $request->inizio;
        $attivitaColturali->fine = $request->fine;
        $attivitaColturali->durata = $request->durata;
        $attivitaColturali->ora_di_inizio = $request->ora_di_inizio;
        $attivitaColturali->stato = $request->stato;
        $attivitaColturali->nascondi = $request->nascondi;
        $attivitaColturali->descrizione = $request->descrizione;
        $attivitaColturali->nome_processo = $request->nome_processo;
        $attivitaColturali->lotto_di_campo = $request->lotto_di_campo;
        $attivitaColturali->area_lavorata = $request->area_lavorata;
        $attivitaColturali->litri_per_ettaro = $request->litri_per_ettaro;
        $attivitaColturali->volume_acqua_utilizzata = $request->volume_acqua_utilizzata;
        $attivitaColturali->aggiungi_i_prodotti = $request->aggiungi_i_prodotti;
        $attivitaColturali->prodotto_utilizzato = $request->prodotto_utilizzato;
        $attivitaColturali->quantià_utilizzata = $request->quantià_utilizzata;
        $attivitaColturali->gg = $request->gg;
        $attivitaColturali->h_gg = $request->h_gg;
        $attivitaColturali->macchinari_utilizzati = $request->macchinari_utilizzati;
        $attivitaColturali->operai_o_addetti = $request->operai_o_addetti;
        $attivitaColturali->save();
        $attivitaColturali->codice = $attivitaColturali->id;
        $attivitaColturali->save();

        return $this->success($attivitaColturali , 'Record Save successfully.', 201);
    }

    public function get(){
        $records = AttivitaColturali::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
        return $this->success($records , 200);
    }

    public function show($id){
        $record = AttivitaColturali::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
    
        if($record) { 
            return $this->success($record, 'Record found', 200);
        }
        if(!isset($record)){
            return response()->json([
                'status' => false,
                'message' => 'Record not Found',
                'data' => '',
                'status_code' => 404
            ], 200);
        }   
    }

    public function delete($id){
        $record = AttivitaColturali::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
        if($record) {
            $record->delete();
            return $this->success('Record Delete Successfully', 200);
        }
        if(!isset($record)){
            return response()->json([
                'status' => false,
                'message' => 'Record not Found',
                'data' => '',
                'status_code' => 404
            ], 200);
        } 
    }

    public function update(Request $request, $id){
        $attivitaColturali = AttivitaColturali::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();

        if($attivitaColturali) {
            $attivitaColturali->user_id = Auth::user()->id;
            $attivitaColturali->farm_id = Auth::user()->farm_id;
            $attivitaColturali->inizio = $request->inizio;
            $attivitaColturali->fine = $request->fine;
            $attivitaColturali->durata = $request->durata;
            $attivitaColturali->ora_di_inizio = $request->ora_di_inizio;
            $attivitaColturali->stato = $request->stato;
            $attivitaColturali->nascondi = $request->nascondi;
            $attivitaColturali->descrizione = $request->descrizione;
            $attivitaColturali->nome_processo = $request->nome_processo;
            $attivitaColturali->lotto_di_campo = $request->lotto_di_campo;
            $attivitaColturali->area_lavorata = $request->area_lavorata;
            $attivitaColturali->litri_per_ettaro = $request->litri_per_ettaro;
            $attivitaColturali->volume_acqua_utilizzata = $request->volume_acqua_utilizzata;
            $attivitaColturali->aggiungi_i_prodotti = $request->aggiungi_i_prodotti;
            $attivitaColturali->prodotto_utilizzato = $request->prodotto_utilizzato;
            $attivitaColturali->quantià_utilizzata = $request->quantià_utilizzata;
            $attivitaColturali->gg = $request->gg;
            $attivitaColturali->h_gg = $request->h_gg;
            $attivitaColturali->macchinari_utilizzati = $request->macchinari_utilizzati;
            $attivitaColturali->operai_o_addetti = $request->operai_o_addetti;
            $attivitaColturali->update();
            return $this->success($attivitaColturali , 'Record update successfully.', 200);   
        }
        if(!isset($attivitaColturali)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function getStato($stato) {

        if($stato == 'true') {
            $records = AttivitaColturali::where('farm_id', Auth::user()->farm_id)->where('stato', 1)->orderBy('id', 'DESC')->get();
        }
        
        if($stato == 'false') {
            $records = AttivitaColturali::where('farm_id', Auth::user()->farm_id)->where('stato', '=', 0)->orderBy('id', 'DESC')->get();
        }

        if($records->isEmpty()){
            return response()->json([
                'status' => false,
                'message' => 'Record not Found',
                'data' => '',
                'status_code' => 404
            ], 200);
        } else {
            return $this->success($records, 'Record found', 200);
        } 
        
    }

}
