<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\AssistenzaSanitaria;
use Illuminate\Support\Facades\Auth;

class AssistenzaSanitariaController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {
        $assistenzaSanitaria =  new AssistenzaSanitaria();
        $assistenzaSanitaria->user_id = Auth::user()->id;
        $assistenzaSanitaria->farm_id = Auth::user()->farm_id;
        $assistenzaSanitaria->animali_id = $request->animali;
        $assistenzaSanitaria->comprovata_necessita = $request->comprovata_necessita;
        $assistenzaSanitaria->tipologia_trattamento = $request->tipologia_trattamento;
        $assistenzaSanitaria->data = $request->data;
        $assistenzaSanitaria->save();

        $assistenzaSanitariaObj = AssistenzaSanitaria::where('id', $assistenzaSanitaria->id)->with('animali')->first();
        return $this->success($assistenzaSanitariaObj , 'Record Save successfully.', 201);
    }

    public function get(){
        $records = AssistenzaSanitaria::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->with('animali')->get();
        return $this->success($records , 200);
    }

    public function show($id){
        $record = AssistenzaSanitaria::where('farm_id', Auth::user()->farm_id)->where('id', $id)->with('animali')->first();
    
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
        $record = AssistenzaSanitaria::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
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
        $assistenzaSanitaria = AssistenzaSanitaria::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
        if($assistenzaSanitaria) {
            $assistenzaSanitaria->animali_id = $request->animali;
            $assistenzaSanitaria->comprovata_necessita = $request->comprovata_necessita;
            $assistenzaSanitaria->tipologia_trattamento = $request->tipologia_trattamento;
            $assistenzaSanitaria->data = $request->data;
            $assistenzaSanitaria->update();

            $assistenzaSanitariaObj = AssistenzaSanitaria::where('id', $assistenzaSanitaria->id)->with('animali')->first();
            return $this->success($assistenzaSanitariaObj , 'Record update successfully.', 200);   
        }
        if(!isset($assistenzaSanitaria)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }
}
