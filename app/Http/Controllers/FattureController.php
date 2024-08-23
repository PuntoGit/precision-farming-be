<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Fatture;

class FattureController extends Controller
{
    use ApiResponser;

    public function store(Request $request) {   
        $fattura = new Fatture();
        $fattura->user_id = Auth::user()->id;
        $fattura->farm_id = Auth::user()->farm_id;
        $fattura->nome = $request->nome;
  
        $file = $request->file('pdf');
        if ($request->hasFile('pdf')) {
            $filename = time().'-'.$file->getClientOriginalName();  
            $file->move(public_path('documents_pdf/fatture'), $filename);
            $fattura->pdf = "documents_pdf/fatture/".$filename;
        }
        $fattura->type = $request->type;
        $fattura->save();

        return $this->success($fattura , 'Record Save successfully.', 201);

    }

    public function getFatture() {
        $records =  Fatture::where('farm_id', Auth::user()->farm_id)->where('type', 'fatture')->orderBy('id', 'DESC')->get();
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
        $record = Fatture::where('id', '=', $id)->first();
    
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
        $record = Fatture::where('id', '=', $id)->first();
        if($record) {
            if($record->pdf) {
                $path = public_path($record->pdf);
                $requested = str_replace("/", "\\", $path);
                $isExists = \File::exists($requested);
                if($isExists){
                    unlink($record->pdf);
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
        $fattura = Fatture::where('id', '=', $id)->first();
        if($fattura) {
   
            $fattura->user_id = Auth::user()->id;
            $fattura->farm_id = Auth::user()->farm_id;
            $fattura->nome = $request->nome;
            $fattura->type = $request->type;
            $file = $request->file('pdf');
            if ($request->hasFile('pdf')) {
                //Delete Old Photo
                if($fattura->pdf) {
                    $path = public_path($fattura->pdf);
                    $requested = str_replace("/", "\\", $path);
                    $isExists = \File::exists($requested);
                    if($isExists){
                        unlink($fattura->pdf);
                    }
                }
                $filename = time().'-'.$file->getClientOriginalName();  
                $file->move(public_path('documents_pdf/fatture'), $filename);
                $fattura->pdf = "documents_pdf/fatture/".$filename; 
            }
            $fattura->update();
            return $this->success($fattura , 'Record Save successfully.', 201);
            
        }
        if(!isset($fattura)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

}
