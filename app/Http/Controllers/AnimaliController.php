<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Animali;
use Illuminate\Support\Facades\Auth;

class AnimaliController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {
        $animali =  new Animali();
        $animali->stella_id = $request->stella;
        $animali->user_id = Auth::user()->id;
        $animali->farm_id = Auth::user()->farm_id;
        $animali->codice = $request->codice;
        $animali->tipologia = $request->tipologia;
        $animali->sesso = $request->sesso;
        $animali->specie = $request->specie;
        $animali->razza = $request->razza;
        $animali->eta_gg = $request->eta_gg;
        $animali->eta_all_acquisto = $request->eta_all_acquisto;
        $animali->note = $request->note;
        $animali->nato_e_allevato = $request->nato_e_allevato;
        $animali->allevato_modo = $request->allevato_modo;
        $animali->razza_a_rischio = $request->razza_a_rischio;
        $animali->riproduzione = $request->riproduzione;
        $animali->causa_inserimento = $request->causa_inserimento;
        $animali->save();

        $animaliObj = Animali::where('id', $animali->id)->with('stella')->first();

        return $this->success($animaliObj , 'Record Save successfully.', 201);
    }

    public function get(){
        $records = Animali::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->with('stella')->get();
        return $this->success($records , 200);
    }

    public function show($id){
        $record = Animali::where('farm_id', Auth::user()->farm_id)->where('id', $id)->with('stella')->first();
    
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
        try {
            $record = Animali::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
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
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => "Impossibile eliminare il record perché è collegato a un'altra tabella.",
                'status_code' => 200,
            ], 200);
        }
        
    }

    public function update(Request $request, $id){
        $animali = Animali::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
        if($animali) {
            $animali->stella_id = $request->stella;
            $animali->user_id = Auth::user()->id;
            $animali->farm_id = Auth::user()->farm_id;
            $animali->codice = $request->codice;
            $animali->tipologia = $request->tipologia;
            $animali->sesso = $request->sesso;
            $animali->specie = $request->specie;
            $animali->razza = $request->razza;
            $animali->eta_gg = $request->eta_gg;
            $animali->eta_all_acquisto = $request->eta_all_acquisto;
            $animali->note = $request->note;
            $animali->nato_e_allevato = $request->nato_e_allevato;
            $animali->allevato_modo = $request->allevato_modo;
            $animali->razza_a_rischio = $request->razza_a_rischio;
            $animali->riproduzione = $request->riproduzione;
            $animali->causa_inserimento = $request->causa_inserimento;
            $animali->update();

            $animaliObj = Animali::where('id', $animali->id)->with('stella')->first();

            return $this->success($animaliObj , 'Record update successfully.', 200);   
        }
        if(!isset($animali)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function getAnimaliStatistic(){
        $records = Animali::where('farm_id', Auth::user()->farm_id)->count();
        return $this->success($records , 200);
    }

}
