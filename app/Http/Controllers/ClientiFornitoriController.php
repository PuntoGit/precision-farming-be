<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Anagrafica;
use App\Models\Documento;
use App\Models\Referente;
use App\Models\ClientiFornitori;
use Illuminate\Support\Facades\Auth;

class ClientiFornitoriController extends Controller
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
        $anagrafica->attivita_lavorativa = $request->anagrafica['attivita_lavorativa'];
        $anagrafica->codice_destinatario_sdi = $request->anagrafica['codice_destinatario_sdi'];
        $anagrafica->partita_iva = $request->anagrafica['partita_iva'];
        $anagrafica->c_f = $request->anagrafica['c_f'];
        $anagrafica->email = $request->anagrafica['email'];
        $anagrafica->pec = $request->anagrafica['pec'];
        $anagrafica->note = $request->anagrafica['note'];

        $documento = new Documento();
        $documento->tipo_di_documento = $request->documento['tipo_di_documento'];
        $documento->numero = $request->documento['numero'];
        $documento->ente_di_rilascio = $request->documento['ente_di_rilascio'];
        $documento->data_rilascio = $request->documento['data_rilascio'];
        $documento->data_scadenza = $request->documento['data_scadenza'];
        $documento->data_di_nascita = $request->documento['data_di_nascita'];
        $documento->comune_di_nascita = $request->documento['comune_di_nascita'];

        $referente =  new Referente();
        $referente->referente = $request->referente['referente'];
        $referente->email = $request->referente['email'];
        $referente->cellulare = $request->referente['cellulare'];
        $referente->telefono = $request->referente['telefono'];

        $clientifornitori =  new ClientiFornitori();

        $anagrafica->save();
        $documento->save();
        $referente->save();

        $clientifornitori->user_id = Auth::user()->id;
        $clientifornitori->farm_id = Auth::user()->farm_id;
        $clientifornitori->anagrafica_id = $anagrafica->id;
        $clientifornitori->documento_id = $documento->id;
        $clientifornitori->referente_id = $referente->id;
        $clientifornitori->type = $request->type;
        $clientifornitori->save();
        $clientifornitori->codice = $clientifornitori->id;

        // save codice with name
        $anagrafica->cognome = $clientifornitori->codice."-".$request->anagrafica['cognome'];
        $anagrafica->denominazione = $clientifornitori->codice."-".$request->anagrafica['denominazione'];
        $anagrafica->save();

        $clientifornitori->save();

        $clientifornitoriObj = ClientiFornitori::where('id', '=', $clientifornitori->id)->with('anagrafica')->with('referente')->with('documento')->first();

        return $this->success($clientifornitoriObj , 'Record Save successfully.', 201);

    }

    public function get($type) {
        if (is_numeric($type)) {
            $id = $type;
            $record = ClientiFornitori::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('anagrafica')->with('referente')->with('documento')->first();
    
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
        } else {
            if($type == 'all') {
                $records = ClientiFornitori::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->with('anagrafica')->with('referente')->with('documento')->get();
                return $this->success($records , 200);
            } else {
                $records = ClientiFornitori::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->where('type', '=', $type)->with('anagrafica')->with('referente')->with('documento')->get();
                return $this->success($records , 200);
            }
        }
        
    }

    public function show($id) {
        $record = ClientiFornitori::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('anagrafica')->with('referente')->with('documento')->first();
    
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
        $record = ClientiFornitori::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('anagrafica')->with('referente')->with('documento')->first();
      
        if($record) {
            $record->anagrafica()->delete();
            $record->referente()->delete();
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

        $clientifornitori = ClientiFornitori::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('anagrafica')->with('referente')->with('documento')->first();

        if($clientifornitori) {

            $anagrafica = Anagrafica::find($clientifornitori->anagrafica_id);

            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->anagrafica['cognome']))
            {
                $cognome = explode("-", $request->anagrafica['cognome']); 
                $anagrafica->cognome = $clientifornitori->codice."-".$cognome[1];
            } else {
                $anagrafica->cognome = $clientifornitori->codice."-".$request->anagrafica['cognome'];
            }

            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->anagrafica['denominazione']))
            {
                $denominazione = explode("-", $request->anagrafica['denominazione']); 
                $anagrafica->denominazione = $clientifornitori->codice."-".$denominazione[1];
            } else {
                $anagrafica->denominazione = $clientifornitori->codice."-".$request->anagrafica['denominazione'];
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
            $anagrafica->attivita_lavorativa = $request->anagrafica['attivita_lavorativa'];
            $anagrafica->codice_destinatario_sdi = $request->anagrafica['codice_destinatario_sdi'];
            $anagrafica->partita_iva = $request->anagrafica['partita_iva'];
            $anagrafica->c_f = $request->anagrafica['c_f'];
            $anagrafica->email = $request->anagrafica['email'];
            $anagrafica->pec = $request->anagrafica['pec'];
            $anagrafica->note = $request->anagrafica['note'];
            $anagrafica->update();

            $documento = Documento::find($clientifornitori->documento_id);
            $documento->tipo_di_documento = $request->documento['tipo_di_documento'];
            $documento->numero = $request->documento['numero'];
            $documento->ente_di_rilascio = $request->documento['ente_di_rilascio'];
            $documento->data_rilascio = $request->documento['data_rilascio'];
            $documento->data_scadenza = $request->documento['data_scadenza'];
            $documento->data_di_nascita = $request->documento['data_di_nascita'];
            $documento->comune_di_nascita = $request->documento['comune_di_nascita'];
            $documento->update();

            $referente =  Referente::find($clientifornitori->referente_id);
            $referente->referente = $request->referente['referente'];
            $referente->email = $request->referente['email'];
            $referente->cellulare = $request->referente['cellulare'];
            $referente->telefono = $request->referente['telefono'];
            $referente->update();

            $clientifornitori->type = $request->type;
            $clientifornitori->update();

            $clientifornitoriObj = ClientiFornitori::where('id', '=', $clientifornitori->id)->with('anagrafica')->with('referente')->with('documento')->first();
            return $this->success($clientifornitoriObj , 'Record update successfully.', 200);
            
        }
        if(!isset($clientifornitori)) {
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }
}
