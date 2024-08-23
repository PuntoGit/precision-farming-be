<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Magazzini;
use Illuminate\Support\Facades\Auth;

class MagazziniController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {

        $magazzini = new Magazzini();
        $magazzini->user_id = Auth::user()->id;
        $magazzini->farm_id = Auth::user()->farm_id;
        $magazzini->note = $request->note;
        $magazzini->save();
        $magazzini->codice = $magazzini->id;
        $magazzini->nome = $magazzini->codice."-".$request->nome;
        $magazzini->save();

        return $this->success($magazzini , 'Record Save successfully.', 201);
    }

    public function get() {
        $records = Magazzini::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
        return $this->success($records , 200);
    }

    public function show($id) {
        $record = Magazzini::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->first();

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
        $record = Magazzini::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->first();

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
        $magazzini = Magazzini::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->first();

        if($magazzini) {
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->nome))
            {
                $nome = explode("-", $request->nome); 
                $magazzini->nome = $magazzini->codice."-".$nome[1];
            } else {
                $magazzini->nome = $magazzini->codice."-".$request->nome;
            }
            $magazzini->user_id = Auth::user()->id;
            $magazzini->farm_id = Auth::user()->farm_id;
            $magazzini->note = $request->note;
            $magazzini->update();

            return $this->success($magazzini , 'Record update successfully.', 200);
        }
        if(!isset($magazzini)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }
}
