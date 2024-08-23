<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Farms;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class FarmsController extends Controller
{
    use ApiResponser;
    public function store(Request $request) {
        $farms =  new Farms();
        $farms->user_id = Auth::user()->id;
        $farms->nome = $request->nome;
        $farms->checklist = $request->checklist;
        
        
        $farms->save();

        $farms->codice = $farms->id;
        $farms->nome = $farms->codice."-".$request->nome;
        $farms->save();

        return $this->success($farms , 'Record Save successfully.', 201);
    }

    public function get(){
        $records =  Farms::where('user_id', '!=', null)->orderBy('id', 'DESC')->get();
        if($records->isEmpty()){
            return response()->json([
                'status' => false,
                'message' => 'Data not available.',
                'data' => '',
                'status_code' => 404
            ], 200);
        } else {
            return $this->success($records, 'Record found', 200);
        } 
    }

    public function show($id){
        $record = Farms::where('id', $id)->first();
    
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
            $record = Farms::where('id', $id)->first();
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
        $farms = Farms::where('id', $id)->first();
        if($farms) {
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $request->nome))
            {
                $nome = explode("-", $request->nome); 
                $farms->nome = $farms->id."-".$nome[1];
            } else {
                $farms->nome = $farms->id."-".$request->nome;
            }

            $farms->checklist = $request->checklist;

            $users = User::where('farm_id', $id)->get();
            foreach ($users as $user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update([
                        'checklist' => $request->checklist
                    ]);
            }        
            
            $farms->update();
            return $this->success($farms , 'Record update successfully.', 200);   
        }
        if(!isset($farms)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }
}
