<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\ColtureColtivates;
use Illuminate\Support\Facades\Auth;

class ColtureColtivatesController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {
        $colture =  new ColtureColtivates();
        $colture->user_id = Auth::user()->id;
        $colture->farm_id = Auth::user()->farm_id;
        $colture->colore = $request->colore;
        $colture->prodotto_coltivato = $request->prodotto_coltivato;
        $colture->udm = $request->udm;
        $colture->specie = $request->specie;
        $colture->descrizione = $request->descrizione;
        $colture->note = $request->note;
        $colture->portinnesto= $request->portinnesto;
        $colture->consumo_animale= $request->consumo_animale;
        $colture->save();

        return $this->success($colture , 'Record Save successfully.', 201);
    }
    public function get(){
        $records = ColtureColtivates::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
        return $this->success($records , 200);
    }
    public function show($id){
        $record = ColtureColtivates::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
    
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
        $record = ColtureColtivates::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
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
        $colture = ColtureColtivates::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();

        if($colture) {
            $colture->user_id = Auth::user()->id;
            $colture->farm_id = Auth::user()->farm_id;
            $colture->colore = $request->colore;
            $colture->prodotto_coltivato = $request->prodotto_coltivato;
            $colture->udm = $request->udm;
            $colture->specie = $request->specie;
            $colture->descrizione = $request->descrizione;
            $colture->note = $request->note;
            $colture->portinnesto= $request->portinnesto;
            $colture->consumo_animale= $request->consumo_animale;
            $colture->update();


            return $this->success($colture , 'Record update successfully.', 200);
            
        }
        if(!isset($colture)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }
}
