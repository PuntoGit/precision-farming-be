<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Models\LottiDiCampo;
use App\Models\Coltivazione;
use Illuminate\Support\Facades\Auth;
use DB;

class LottiDiCampoController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {

        $lottiDiCampo = new LottiDiCampo();
        $lottiDiCampo->user_id = Auth::user()->id;
        $lottiDiCampo->farm_id = Auth::user()->farm_id;
        $lottiDiCampo->nome = $request->nome;
        $lottiDiCampo->coltura = $request->coltura;
        $lottiDiCampo->area_util_ha = $request->area_util_ha;
        $lottiDiCampo->terreno = $request->terreno;
        $lottiDiCampo->particelle_catastali = $request->particelle_catastali;
        $lottiDiCampo->apertura = $request->apertura;
        $lottiDiCampo->chiusura = $request->chiusura;
        $lottiDiCampo->stagione = $request->stagione;

        $coltivazione =  new Coltivazione();
        $coltivazione->coltivazione = $request->coltivaziones['coltivazione'];
        $coltivazione->data_di_impianto = $request->coltivaziones['data_di_impianto'];
        $coltivazione->certificazione = $request->coltivaziones['certificazione'];
        $coltivazione->numero_anni_di_produzione = $request->coltivaziones['numero_anni_di_produzione'];
        $coltivazione->data_inizio_fioritura = $request->coltivaziones['data_inizio_fioritura'];
        $coltivazione->data_fine_fioritura = $request->coltivaziones['data_fine_fioritura'];
        $coltivazione->data_prima_raccolta = $request->coltivaziones['data_prima_raccolta'];
        $coltivazione->produzione_prevista = $request->coltivaziones['produzione_prevista'];
        $coltivazione->lunghezza = $request->coltivaziones['lunghezza'];
        $coltivazione->larghezza = $request->coltivaziones['larghezza'];
        $coltivazione->numero_di_piante = $request->coltivaziones['numero_di_piante'];
        $coltivazione->note = $request->coltivaziones['note'];
        
        $lottiDiCampo->save();
        $lottiDiCampo->codice = $lottiDiCampo->id;
        $lottiDiCampo->nome = $lottiDiCampo->codice."-".$request->nome;
        $lottiDiCampo->save();

        $coltivazione->lotti_id = $lottiDiCampo->id;
        $coltivazione->save();

        $lottiDiCampoObj = LottiDiCampo::where('id', '=', $lottiDiCampo->id)->with('coltivaziones')->first();
        return $this->success($lottiDiCampoObj , 'Record Save successfully.', 201);
    }

    public function get() {
        $records = LottiDiCampo::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->with('coltivaziones')->get();
        return $this->success($records , 200);
    }

    public function show($id) {
        $record = LottiDiCampo::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('coltivaziones')->first();
    
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

    public function delete($id) {
        $record = LottiDiCampo::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('coltivaziones')->first();
        if($record) {
            $record->coltivaziones()->delete();
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
        $lottiDiCampo = LottiDiCampo::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('coltivaziones')->first();
        
        if($lottiDiCampo) {
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->nome))
            {
                $nome = explode("-", $request->nome); 
                $lottiDiCampo->nome = $lottiDiCampo->id."-".$nome[1];
            } else {
                $lottiDiCampo->nome = $lottiDiCampo->id."-".$request->nome;
            }
            $lottiDiCampo->coltura = $request->coltura;
            $lottiDiCampo->area_util_ha = $request->area_util_ha;
            $lottiDiCampo->terreno = $request->terreno;
            $lottiDiCampo->particelle_catastali = $request->particelle_catastali;
            $lottiDiCampo->apertura = $request->apertura;
            $lottiDiCampo->chiusura = $request->chiusura;
            $lottiDiCampo->stagione = $request->stagione;
            $lottiDiCampo->update();

            if(isset($request->coltivaziones)) {
                $coltivazione =  Coltivazione::where('lotti_id', $lottiDiCampo->id)->first();
                $coltivazione->coltivazione = $request->coltivaziones['coltivazione'];
                $coltivazione->data_di_impianto = $request->coltivaziones['data_di_impianto'];
                $coltivazione->certificazione = $request->coltivaziones['certificazione'];
                $coltivazione->numero_anni_di_produzione = $request->coltivaziones['numero_anni_di_produzione'];
                $coltivazione->data_inizio_fioritura = $request->coltivaziones['data_inizio_fioritura'];
                $coltivazione->data_fine_fioritura = $request->coltivaziones['data_fine_fioritura'];
                $coltivazione->data_prima_raccolta = $request->coltivaziones['data_prima_raccolta'];
                $coltivazione->produzione_prevista = $request->coltivaziones['produzione_prevista'];
                $coltivazione->lunghezza = $request->coltivaziones['lunghezza'];
                $coltivazione->larghezza = $request->coltivaziones['larghezza'];
                $coltivazione->numero_di_piante = $request->coltivaziones['numero_di_piante'];
                $coltivazione->note = $request->coltivaziones['note'];
                $coltivazione->update();
            }

            $lottiDiCampoObj = LottiDiCampo::where('id', '=', $lottiDiCampo->id)->with('coltivaziones')->first();
            return $this->success($lottiDiCampoObj , 'Record update successfully.', 200);
        }
        if(!isset($lottiDiCampo)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function getSpecieColtivateStatistics() {
        $records = LottiDiCampo::where('farm_id', Auth::user()->farm_id)->where('stagione', '=', 1)->distinct('coltura')->count('coltura');
        return $this->success($records , 200);
    }

    public function requireWaterAction(){
        $records = DB::table('lotti_di_campos')->rightJoin('attivita_colturalis', 'lotti_di_campos.nome', '=', 'attivita_colturalis.lotto_di_campo')->where([
            ['lotti_di_campos.farm_id', '=', Auth::user()->farm_id],
            ['lotti_di_campos.stagione', '=', 1],
            ['attivita_colturalis.volume_acqua_utilizzata', '>', 0]
        ])->groupBy('lotti_di_campos.id')->select('lotti_di_campos.nome', DB::raw('MAX(STR_TO_DATE(attivita_colturalis.fine, "%d-%m-%Y")) as last_water_date'), DB::raw('"water" as type'))->get();
        return $this->success($records , 200);
    }

    public function requireFertilizerAction(){
        $records = DB::table('lotti_di_campos')->rightJoin('attivita_colturalis', 'lotti_di_campos.nome', '=', 'attivita_colturalis.lotto_di_campo')->rightJoin('prodottis', 'prodottis.id', '=', 'attivita_colturalis.prodotto_utilizzato')->where([
            ['lotti_di_campos.farm_id', '=', Auth::user()->farm_id],
            ['lotti_di_campos.stagione', '=', 1],
            ['prodottis.tipologia', '=', "Concime"]
        ])->groupBy('lotti_di_campos.id')->select('lotti_di_campos.nome', DB::raw('MAX(STR_TO_DATE(attivita_colturalis.fine, "%d-%m-%Y")) as last_concime_date'), DB::raw('"fertilizer" as type'))->get();
        return $this->success($records , 200);
    }
}
