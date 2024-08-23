<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Alimenti;
use Illuminate\Support\Facades\Auth;

class AlimentiController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {

        $alimenti =  new Alimenti();
        $alimenti->user_id = Auth::user()->id;
        $alimenti->farm_id = Auth::user()->farm_id;
        $alimenti->provenienza = $request->provenienza;
        $alimenti->bio = $request->bio;
        $alimenti->tipologia = $request->tipologia;
        $alimenti->tipologia_mangime = $request->tipologia_mangime;
        $alimenti->save();

        $alimenti->codice = $alimenti->id;
        $alimenti->nome = $alimenti->codice."-".$request->nome;
        $alimenti->save();

        return $this->success($alimenti , 'Record Save successfully.', 201);
    }

    public function get(){
        $records = Alimenti::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
        return $this->success($records , 200);
    }

    public function show($id){
        $record = Alimenti::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
    
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
        $record = Alimenti::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
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
        $alimenti = Alimenti::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
        if($alimenti) {
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->nome))
            {
                $nome = explode("-", $request->nome); 
                $alimenti->nome = $alimenti->id."-".$nome[1];
            } else {
                $alimenti->nome = $alimenti->id."-".$request->nome;
            }
            $alimenti->provenienza = $request->provenienza;
            $alimenti->bio = $request->bio;
            $alimenti->tipologia = $request->tipologia;
            $alimenti->tipologia_mangime = $request->tipologia_mangime;
            $alimenti->update();
            return $this->success($alimenti , 'Record update successfully.', 200);   
        }
        if(!isset($alimenti)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }
}
