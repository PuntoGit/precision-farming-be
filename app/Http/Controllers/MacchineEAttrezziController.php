<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\MacchineEAttrezzi;
use App\Models\Assicurazione;
use App\Models\Prodotti;
use File;
use DB;
use Illuminate\Support\Facades\Auth;

class MacchineEAttrezziController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {
        
        $macchineEAttrezzi = new MacchineEAttrezzi();
        $macchineEAttrezzi->user_id = Auth::user()->id;
        $macchineEAttrezzi->farm_id = Auth::user()->farm_id;
        $macchineEAttrezzi->marca_produttore = $request->marca_produttore;
        $macchineEAttrezzi->numero_di_matricola = $request->numero_di_matricola;
        $macchineEAttrezzi->data_acq = $request->data_acq;
        $macchineEAttrezzi->ore_di_lavoro_alla_registrazione = $request->ore_di_lavoro_alla_registrazione;
        $macchineEAttrezzi->ore_di_lavoro_calcolate = $request->ore_di_lavoro_calcolate;
        $macchineEAttrezzi->km_di_lavoro_attuali = $request->km_di_lavoro_attuali;
        $macchineEAttrezzi->tipologia = $request->tipologia;

        $file = $request->file('foto');
        if ($request->hasFile('foto')) {
            $filename = time().'-'.$file->getClientOriginalName();  
            $file->move(public_path('fotos'), $filename);
            $macchineEAttrezzi->foto = "fotos/".$filename;  
        }
        $macchineEAttrezzi->modello = $request->modello;
        $macchineEAttrezzi->descrizione = $request->descrizione;
        $macchineEAttrezzi->utilizzo_di_carburante =  $request->utilizzo_di_carburante === 'true' ? true: false;

        $assicurazione =  new Assicurazione();
        $assicurazioneObj = json_decode($request->assicurazione, true);
        $assicurazione->compagnia_assicurativa = $assicurazioneObj['compagnia_assicurativa'];
        $assicurazione->data_di_scadenza = $assicurazioneObj['data_di_scadenza'];
        $assicurazione->la_rinnovo_ogni = $assicurazioneObj['la_rinnovo_ogni'];
        $assicurazione->avvisami_alla_scadenza = $assicurazioneObj['avvisami_alla_scadenza'];

        $macchineEAttrezzi->save();
        $macchineEAttrezzi->codice = $macchineEAttrezzi->id;
        $macchineEAttrezzi->nome_macch_attr = $macchineEAttrezzi->codice."-".$request->nome_macch_attr;
        $macchineEAttrezzi->save();

        $assicurazione->macchine_id = $macchineEAttrezzi->id;
        $assicurazione->save();

        $macchineEAttrezziObj = MacchineEAttrezzi::where('id', '=', $macchineEAttrezzi->id)->with('assicurazione')->first();
        return $this->success($macchineEAttrezziObj , 'Record Save successfully.', 201);

    }

    public function get() {
        $records = MacchineEAttrezzi::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->with('assicurazione')->get();
        return $this->success($records , 200);
    }

    public function show($id) {
        $record = MacchineEAttrezzi::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('assicurazione')->first();
    
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
        $record = MacchineEAttrezzi::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('assicurazione')->first();
        if($record) {
            if($record->foto) {
                $path = public_path($record->foto);
                $requested = str_replace("/", "\\", $path);
                $isExists = \File::exists($requested);
                if($isExists){
                    unlink($record->foto);
                }
            }
            $record->assicurazione()->delete();
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

    public function update(Request $request, $id) {
        $macchineEAttrezzi = MacchineEAttrezzi::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->with('assicurazione')->first();
        if($macchineEAttrezzi) {
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->nome_macch_attr))
            {
                $nome = explode("-", $request->nome_macch_attr); 
                $macchineEAttrezzi->nome_macch_attr = $macchineEAttrezzi->id."-".$nome[1];
            } else {
                $macchineEAttrezzi->nome_macch_attr = $macchineEAttrezzi->id."-".$request->nome_macch_attr;
            }
            $macchineEAttrezzi->user_id = Auth::user()->id;
            $macchineEAttrezzi->farm_id = Auth::user()->farm_id;

            $macchineEAttrezzi->marca_produttore = $request->marca_produttore;
            $macchineEAttrezzi->numero_di_matricola = $request->numero_di_matricola;
            $macchineEAttrezzi->data_acq = $request->data_acq;
            $macchineEAttrezzi->ore_di_lavoro_alla_registrazione = $request->ore_di_lavoro_alla_registrazione;
            $macchineEAttrezzi->ore_di_lavoro_calcolate = $request->ore_di_lavoro_calcolate;
            $macchineEAttrezzi->km_di_lavoro_attuali = $request->km_di_lavoro_attuali;
            $macchineEAttrezzi->tipologia = $request->tipologia;
    
            $file = $request->file('foto');
            if ($request->hasFile('foto')) {
                //Delete Old Photo
                if($macchineEAttrezzi->foto) {
                    $path = public_path($macchineEAttrezzi->foto);
                    $requested = str_replace("/", "\\", $path);
                    $isExists = \File::exists($requested);
                    if($isExists){
                        unlink($macchineEAttrezzi->foto);
                    }
                }
                $filename = time().'-'.$file->getClientOriginalName();  
                $file->move(public_path('fotos'), $filename);
                $macchineEAttrezzi->foto = "fotos/".$filename; 
            }
            $macchineEAttrezzi->modello = $request->modello;
            $macchineEAttrezzi->descrizione = $request->descrizione;
            $macchineEAttrezzi->utilizzo_di_carburante =  $request->utilizzo_di_carburante === 'true' ? true: false;
            $macchineEAttrezzi->update();
    
            if(isset($request->assicurazione)) {
                $assicurazione =  Assicurazione::where('macchine_id', $macchineEAttrezzi->id)->first();
                $assicurazioneObj = json_decode($request->assicurazione, true);
                $assicurazione->compagnia_assicurativa = $assicurazioneObj['compagnia_assicurativa'];
                $assicurazione->data_di_scadenza = $assicurazioneObj['data_di_scadenza'];
                $assicurazione->la_rinnovo_ogni = $assicurazioneObj['la_rinnovo_ogni'];
                $assicurazione->avvisami_alla_scadenza = $assicurazioneObj['avvisami_alla_scadenza'];
                $assicurazione->update();
            }
    
            $macchineEAttrezziObj = MacchineEAttrezzi::where('id', '=', $macchineEAttrezzi->id)->with('assicurazione')->first();
            return $this->success($macchineEAttrezziObj , 'Record Save successfully.', 201);
            
        }
        if(!isset($macchineEAttrezzi)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function getCarburantes() {
        $records = Prodotti::where('tipologia_prodotto', '=', 'carburante')->where('tipologia_prodotto', '=', 'Carburante')->where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
        return $this->success($records , 200);
    }

    public function updateMacchines(Request $request) {

        for ($i=0; $i<count($request->all()); $i++) {

            DB::table('macchine_e_attrezzis')
                ->where('id', $request[$i]['id'])
                ->where('farm_id', Auth::user()->farm_id)
                ->update([
                    'ore_di_lavoro_calcolate' => $request[$i]['ore_di_lavoro_calcolate'],
            ]);
    
        }
        return $this->success("", 'Records update successfully' , 200);
    }
}
