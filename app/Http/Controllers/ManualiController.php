<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Manuali;

class ManualiController extends Controller
{
    use ApiResponser;

    public function store(Request $request) {   
        $manuale = new Manuali();
        $manuale->user_id = Auth::user()->id;
        $manuale->farm_id = Auth::user()->farm_id;
        $manuale->nome = $request->nome;
  
        $file = $request->file('pdf');
        if ($request->hasFile('pdf')) {
            $filename = time().'-'.$file->getClientOriginalName();  
            $file->move(public_path('documents_pdf/manuali'), $filename);
            $manuale->pdf = "documents_pdf/manuali/".$filename;
        }
        $manuale->type = $request->type;
        $manuale->save();

        return $this->success($manuale , 'Record Save successfully.', 201);

    }

    public function getManuali() {
        $records =  Manuali::where('farm_id', Auth::user()->farm_id)->orWhere('farm_id', 1)->where('type', 'manuali')->orderBy('id', 'DESC')->get();
        if($records->isEmpty()){
            return response()->json([
                'status' => false,
                'message' => 'Data not available.',
                'data' => '[]',
                'status_code' => 404
            ], 200);
        } else {
            return $this->success($records, 'Record found', 200);
        } 
    }

    public function show($id) {
        $record = Manuali::where('id', '=', $id)->first();
    
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
        $record = Manuali::where('id', '=', $id)->first();
        if($record) {
            if($record->pdf) {
                $path = public_path($record->pdf);
                $isExists1 = \File::exists($path);
                if($isExists1){
                    unlink($path);
                }

                $requested = str_replace("/", "\\", $path);
                $isExists = \File::exists($requested);
                if($isExists){
                    unlink($requested);
                }
            }
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
        $manuale = Manuali::where('id', '=', $id)->first();
        if($manuale) {
   
            $manuale->user_id = Auth::user()->id;
            $manuale->farm_id = Auth::user()->farm_id;
            $manuale->nome = $request->nome;
            $manuale->type = $request->type;
            $file = $request->file('pdf');
            if ($request->hasFile('pdf')) {
                //Delete Old Photo
                if($manuale->pdf) {
                    $path = public_path($manuale->pdf);
                    $requested = str_replace("/", "\\", $path);
                    $isExists = \File::exists($requested);
                    if($isExists){
                        unlink($manuale->pdf);
                    }
                }
                $filename = time().'-'.$file->getClientOriginalName();  
                $file->move(public_path('documents_pdf/manuli'), $filename);
                $manuale->pdf = "documents_pdf/manuali/".$filename; 
            }
            $manuale->update();
            return $this->success($manuale , 'Record Save successfully.', 201);
            
        }
        if(!isset($manuale)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

}
