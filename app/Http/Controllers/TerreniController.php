<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Terreni;
use App\Models\SubTerreni;
use DB;
use Illuminate\Support\Facades\Auth;

class TerreniController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {
        $terreni =  new Terreni();
        $terreni->user_id = Auth::user()->id;
        $terreni->farm_id = Auth::user()->farm_id;
        $terreni->comune_di_appartenenza = $request->comune_di_appartenenza;
        $terreni->costo_per_anno = $request->costo_per_anno;
        $terreni->ricavo_per_anno = $request->ricavo_per_anno;
        $terreni->tipo_di_gestione = $request->tipo_di_gestione;
        $terreni->nome_del_proprietario = $request->nome_del_proprietario;
        $terreni->latitude = $request->latitude;
        $terreni->longitude = $request->longitude;
        $terreni->stato = $request->stato;
        $terreni->area_graf_ha = $request->area_graf_ha;
        $terreni->suolo_vivo = $request->suolo_vivo;
        $terreni->save();
        $terreni->codice = $terreni->id;
        $terreni->nome_terreno = $terreni->id."-".$request->nome_terreno;
        $terreni->save();

        foreach($request->subTerreni as $subTerreniItem){
            $subTerreni = new SubTerreni();
            $subTerreni->terrenis_id = $terreni->id;
            $subTerreni->area_graf_ha = $subTerreniItem['area_graf_ha'];
            $subTerreni->area_cat_ha = $subTerreniItem['area_cat_ha'];
            $subTerreni->sez = $subTerreniItem['sez'];
            $subTerreni->foglio = $subTerreniItem['foglio'];
            $subTerreni->particelle = $subTerreniItem['particelle'];
            $subTerreni->sub = $subTerreniItem['sub'];
            $subTerreni->comune = $subTerreniItem['comune'];
            $subTerreni->proprietario = $subTerreniItem['proprietario'];
            $subTerreni->save();
        }

        return $this->success($terreni , 'Record Save successfully.', 201);
    }
    public function get(){
        $records = Terreni::where('farm_id', Auth::user()->farm_id)->with('subTerreni')->orderBy('id', 'DESC')->get();
        return $this->success($records , 200);
    }
    public function show($id){
        $record = Terreni::where('id', $id)->where('farm_id', Auth::user()->farm_id)->with('subTerreni')->first();
    
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
        $record = Terreni::where('id', $id)->where('farm_id', Auth::user()->farm_id)->with('subTerreni')->first();
        if($record) {
            $record->subterreni()->delete();
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
        $terreni = Terreni::where('id', $id)->where('farm_id', Auth::user()->farm_id)->with('subTerreni')->first();
        
        if($terreni) {
            $terreni->user_id = Auth::user()->id;
            $terreni->farm_id = Auth::user()->farm_id;
            $terreni->comune_di_appartenenza = $request->comune_di_appartenenza;
            $terreni->costo_per_anno = $request->costo_per_anno;
            $terreni->ricavo_per_anno = $request->ricavo_per_anno;
            $terreni->tipo_di_gestione = $request->tipo_di_gestione;
            $terreni->nome_del_proprietario = $request->nome_del_proprietario;
            $terreni->latitude = $request->latitude;
            $terreni->longitude = $request->longitude;
            $terreni->stato = $request->stato;
            $terreni->area_graf_ha = $request->area_graf_ha;
            $terreni->suolo_vivo = $request->suolo_vivo;
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->nome_terreno))
            {
                $nome = explode("-", $request->nome_terreno); 
                $terreni->nome_terreno =  $terreni->id."-".$nome[1];
            } else {
                $terreni->nome_terreno = $terreni->id."-".$request->nome_terreno;
            }
            $terreni->update();
            
            SubTerreni::where('terrenis_id', '=', $terreni->id)->delete();
            foreach($request->subTerreni as $subTerreniItem){
                $subTerreni = new SubTerreni();
                $subTerreni->terrenis_id = $terreni->id;
                $subTerreni->area_graf_ha = $subTerreniItem['area_graf_ha'];
                $subTerreni->area_cat_ha = $subTerreniItem['area_cat_ha'];
                $subTerreni->sez = $subTerreniItem['sez'];
                $subTerreni->foglio = $subTerreniItem['foglio'];
                $subTerreni->particelle = $subTerreniItem['particelle'];
                $subTerreni->sub = $subTerreniItem['sub'];
                $subTerreni->comune = $subTerreniItem['comune'];
                $subTerreni->proprietario = $subTerreniItem['proprietario'];
                $subTerreni->save();
            }

            return $this->success($terreni , 'Record update successfully.', 200);
            
        }
        if(!isset($terreni)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }
}
