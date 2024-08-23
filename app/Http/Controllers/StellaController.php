<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Stella;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class StellaController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {

        $stella =  new Stella();
        $stella->user_id = Auth::user()->id;
        $stella->farm_id = Auth::user()->farm_id;
        $stella->codice = $request->codice;
        $stella->nome = $request->nome;
        $stella->area_coperta = $request->area_coperta;
        $stella->tenuta_pavimentazione = $request->tenuta_pavimentazione;
        $stella->areazione_adeguata = $request->areazione_adeguata;
        $stella->la_sezione = $request->la_sezione;
        $stella->tecnica_alimentazione = $request->tecnica_alimentazione;
        $stella->illuminazione = $request->illuminazione;
        $stella->vengono_utilizzati = $request->vengono_utilizzati;
        $stella->area_scoperta = $request->area_scoperta;
        $stella->terreno_salubre = $request->terreno_salubre;
        $stella->terreno_bio = $request->terreno_bio;
        $stella->save();

        return $this->success($stella , 'Record Save successfully.', 201);
    }

    public function get(){
        $records = Stella::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
        return $this->success($records , 200);
    }

    public function show($id){
        $record = Stella::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
    
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
            $record = Stella::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
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
        $stella = Stella::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
        if($stella) {
            $stella->user_id = Auth::user()->id;
            $stella->farm_id = Auth::user()->farm_id;
            $stella->codice = $request->codice;
            $stella->nome = $request->nome;
            $stella->area_coperta = $request->area_coperta;
            $stella->tenuta_pavimentazione = $request->tenuta_pavimentazione;
            $stella->areazione_adeguata = $request->areazione_adeguata;
            $stella->la_sezione = $request->la_sezione;
            $stella->tecnica_alimentazione = $request->tecnica_alimentazione;
            $stella->illuminazione = $request->illuminazione;
            $stella->vengono_utilizzati = $request->vengono_utilizzati;
            $stella->area_scoperta = $request->area_scoperta;
            $stella->terreno_salubre = $request->terreno_salubre;
            $stella->terreno_bio = $request->terreno_bio;
            $stella->update();
            return $this->success($stella , 'Record update successfully.', 200);   
        }
        if(!isset($stella)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    public function getStalleStatistic(){
        $records = Stella::where('farm_id', Auth::user()->farm_id)->count();
        return $this->success($records , 200);
    }
}
