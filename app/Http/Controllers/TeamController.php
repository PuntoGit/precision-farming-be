<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Anagrafica;
use App\Models\Documento;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {

        $anagrafica = new Anagrafica();
        // $anagrafica->cognome = $request->anagrafica['cognome'];
        $anagrafica->nome = $request->anagrafica['nome'];
        // $anagrafica->denominazione = $request->anagrafica['denominazione'];
        $anagrafica->indirizzo = $request->anagrafica['indirizzo'];
        $anagrafica->citta = $request->anagrafica['citta'];
        $anagrafica->cap = $request->anagrafica['cap'];
        $anagrafica->prov = $request->anagrafica['prov'];
        $anagrafica->paese = $request->anagrafica['paese'];
        $anagrafica->cellulare = $request->anagrafica['cellulare'];
        $anagrafica->telefono = $request->anagrafica['telefono'];
        $anagrafica->tipologia_persona = $request->anagrafica['tipologia_persona'];
        $anagrafica->partita_iva = $request->anagrafica['partita_iva'];
        $anagrafica->c_f = $request->anagrafica['c_f'];
        $anagrafica->email = $request->anagrafica['email'];
        $anagrafica->note = $request->anagrafica['note'];
        if(isset($request->anagrafica['responsabile_del_trattamento'])) {
            $anagrafica->responsabile_del_trattamento = $request->anagrafica['responsabile_del_trattamento'];
        }

        $documento = new Documento();
        $documento->tipo_di_documento = $request->documento['tipo_di_documento'];
        $documento->numero = $request->documento['numero'];
        $documento->ente_di_rilascio = $request->documento['ente_di_rilascio'];
        $documento->data_rilascio = $request->documento['data_rilascio'];
        $documento->data_scadenza = $request->documento['data_scadenza'];
        $documento->data_di_nascita = $request->documento['data_di_nascita'];
        $documento->comune_di_nascita = $request->documento['comune_di_nascita'];

        $team =  new Team();

        $anagrafica->save();
        $documento->save();
        $team->anagrafica_id = $anagrafica->id;
        $team->documento_id = $documento->id;

        $team->user_id = Auth::user()->id;
        $team->farm_id = Auth::user()->farm_id;
        $team->deactivate = $request->deactivate;
        $team->tipologia_di_contratto = $request->tipologia_di_contratto;
        $team->qualifica = $request->qualifica;
        $team->costo_orario = $request->costo_orario;
        $team->inizio_assunzione = $request->inizio_assunzione;
        $team->fine_assunzione = $request->fine_assunzione;
        
        $team->save();
        $team->codice = $team->id;
        
        // save codice with name
        $anagrafica->cognome = $team->codice."-".$request->anagrafica['cognome'];
        $anagrafica->denominazione = $team->codice."-".$request->anagrafica['denominazione'];
        $anagrafica->save();

        $team->save();

        $teamObj = Team::where('id', '=', $team->id)->with('anagrafica')->with('documento')->first();

        return $this->success($teamObj , 'Record Save successfully.', 201);
    }

    public function get() {
        $records = Team::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->with('anagrafica')->with('documento')->get();
        return $this->success($records , 200);
    }

    public function getByFarmId($id) {
        $records = Team::where('farm_id', '=', $id)->orderBy('id', 'DESC')->with('anagrafica')->get();
        return $this->success($records , 200);
    }

    public function show($id) {
        $record = Team::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('anagrafica')->with('documento')->first();
    
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
        $record = Team::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('anagrafica')->with('documento')->first();
        if($record) {
            $record->anagrafica()->delete();
            $record->documento()->delete();
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
        $team = Team::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('anagrafica')->with('documento')->first();

        if($team) {
            $team->user_id = Auth::user()->id;
            $team->farm_id = Auth::user()->farm_id;
            $team->deactivate = $request->deactivate;
            $team->tipologia_di_contratto = $request->tipologia_di_contratto;
            $team->qualifica = $request->qualifica;
            $team->costo_orario = $request->costo_orario;
            $team->inizio_assunzione = $request->inizio_assunzione;
            $team->fine_assunzione = $request->fine_assunzione;
            $team->update();

            $anagrafica = Anagrafica::find($team->anagrafica_id);

            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->anagrafica['cognome']))
            {
                $cognome = explode("-", $request->anagrafica['cognome']); 
                $anagrafica->cognome = $team->codice."-".$cognome[1];
            } else {
                $anagrafica->cognome = $team->codice."-".$request->anagrafica['cognome'];
            }

            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->anagrafica['denominazione']))
            {
                $denominazione = explode("-", $request->anagrafica['denominazione']); 
                $anagrafica->denominazione = $team->codice."-".$denominazione[1];
            } else {
                $anagrafica->denominazione = $team->codice."-".$request->anagrafica['denominazione'];
            }

            $anagrafica->nome = $request->anagrafica['nome'];
            $anagrafica->indirizzo = $request->anagrafica['indirizzo'];
            $anagrafica->citta = $request->anagrafica['citta'];
            $anagrafica->cap = $request->anagrafica['cap'];
            $anagrafica->prov = $request->anagrafica['prov'];
            $anagrafica->paese = $request->anagrafica['paese'];
            $anagrafica->cellulare = $request->anagrafica['cellulare'];
            $anagrafica->telefono = $request->anagrafica['telefono'];
            $anagrafica->tipologia_persona = $request->anagrafica['tipologia_persona'];
            $anagrafica->partita_iva = $request->anagrafica['partita_iva'];
            $anagrafica->c_f = $request->anagrafica['c_f'];
            $anagrafica->email = $request->anagrafica['email'];
            $anagrafica->note = $request->anagrafica['note'];
            if(isset($request->anagrafica['responsabile_del_trattamento'])) {
                $anagrafica->responsabile_del_trattamento = $request->anagrafica['responsabile_del_trattamento'];
            }
            $anagrafica->update();

            $documento = Documento::find($team->documento_id);
            $documento->tipo_di_documento = $request->documento['tipo_di_documento'];
            $documento->numero = $request->documento['numero'];
            $documento->ente_di_rilascio = $request->documento['ente_di_rilascio'];
            $documento->data_rilascio = $request->documento['data_rilascio'];
            $documento->data_scadenza = $request->documento['data_scadenza'];
            $documento->data_di_nascita = $request->documento['data_di_nascita'];
            $documento->comune_di_nascita = $request->documento['comune_di_nascita'];
            $documento->update();
          
            $teamObj = Team::where('id', '=', $team->id)->with('anagrafica')->with('documento')->first();

            return $this->success($teamObj , 'Record update successfully.', 200);
            
        }
        if(!isset($team)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function updateContract(Request $request, $id){
        
        $team = Team::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('anagrafica')->with('documento')->first();
        if($team) {
            if(isset( $request->deactivate )) {
                $team->deactivate = $request->deactivate;
            }
            if(isset( $request->tipologia_di_contratto )) {
                $team->tipologia_di_contratto = $request->tipologia_di_contratto;
            }
            if(isset( $request->qualifica )) {
                $team->qualifica = $request->qualifica;
            }
            if(isset($request->costo_orario)) {
                $team->costo_orario = $request->costo_orario;
            }
            if(isset( $request->inizio_assunzione )) {
                $team->inizio_assunzione = $request->inizio_assunzione;
            }
            if(isset( $request->fine_assunzione )) {
                $team->fine_assunzione = $request->fine_assunzione;
            }
           
            $team->update();

            $teamObj = Team::where('id', '=', $team->id)->with('anagrafica')->with('documento')->first();

            return $this->success($teamObj , 'Record update successfully.', 200);
            
        }
        if(!isset($team)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 

    }

    public function getTeamStatistic() {
        $records = Team::where('farm_id', Auth::user()->farm_id)->count();
        return $this->success($records , 200);
    }
}
