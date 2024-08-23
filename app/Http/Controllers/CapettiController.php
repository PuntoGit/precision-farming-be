<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Capetti;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class CapettiController extends Controller
{
    use ApiResponser;

    public function store(Request $request) {    
        $input = $request->all();
        $sonda = DB::insert('insert into capettis (farm_id, nome, capetti_licence, capetti_mac_base, capetti_mac_sonda, temp_low, temp_high, hum_low, hum_high) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [Auth::user()->farm_id, $input['nome'], $input['capetti_licence'], $input['capetti_mac_base'], $input['capetti_mac_sonda'], $input['temp_low'], $input['temp_high'], $input['hum_low'], $input['hum_high']]);
        if($sonda){
            $records = Capetti::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
            return response()->json([
                'status' => true,
                'message' => 'Sonda saved succesfully',
                'data' => $records,
                'status_code' => 201
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Sonda not inserted',
                'data' => 'Sonda ko',
                'status_code' => 404
            ], 404);
        }
        
    }

    public function get(){
        $records = Capetti::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
        if($records->isEmpty()){
            return response()->json([
                'status' => false,
                'message' => 'There are zero sonde registered in your farm.',
                'data' => '',
                'status_code' => 404
            ], 200);
        } else {
            return $this->success($records, 'These are all the registered sonde for your farm.', 200);
        } 
    }

    public function show($id){
        $record = Capetti::where('farm_id', Auth::user()->farm_id)->where('id', $id)->first();
    
        if($record) { 
            return $this->success($record, 'These are the details of the requested sonda.', 200);
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
            $record = Capetti::where('id', $id)->first();
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
        $input = $request->all();
        $record = Capetti::where('farm_id', Auth::user()->farm_id)->where('id', '=', $id)->first();
        if($record) {
            $newrecord = DB::update('update capettis set nome = ?, capetti_licence = ?, capetti_mac_base = ?, capetti_mac_sonda = ?, temp_low = ?, temp_high = ?, hum_low = ?, hum_high = ? where id = ?', [$input['nome'], $input['capetti_licence'], $input['capetti_mac_base'], $input['capetti_mac_sonda'], $input['temp_low'], $input['temp_high'], $input['hum_low'], $input['hum_high'], $id]);
            if($newrecord){
                $records = Capetti::where('farm_id', Auth::user()->farm_id)->orderBy('id', 'DESC')->get();
                return response()->json([
                    'status' => true,
                    'message' => 'Sonda updated succesfully',
                    'data' => $records,
                    'status_code' => 201
                ], 201);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Sonda not updated',
                    'data' => 'Sonda ko',
                    'status_code' => 404
                ], 404);
            }
        }
        if(!isset($record)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Sonda not Found',
                'status_code' => 404
            ], 200);
        } 
    }
}
