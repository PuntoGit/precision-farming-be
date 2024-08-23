<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use File;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;

class DocumentController extends Controller
{
    use ApiResponser;

    public function store(Request $request) {   
        $document = new Document();
        $document->user_id = Auth::user()->id;
        $document->farm_id = Auth::user()->farm_id;
        $document->nome = $request->nome;
  
        $file = $request->file('pdf');
        if ($request->hasFile('pdf')) {
            $filename = time().'-'.$file->getClientOriginalName();  
            $file->move(public_path('documents_pdf'), $filename);
            $document->pdf = "documents_pdf/".$filename;
        }
        $document->type = $request->type;
        $document->save();

        return $this->success($document , 'Record Save successfully.', 201);

    }

    public function getAllegati() {
        $records =  Document::where('type', 'allegati')->orderBy('id', 'DESC')->get();
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

    public function getNormative() {
        $records =  Document::where('type', 'normative')->orderBy('id', 'DESC')->get();
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
    
    public function getDocumenti() {
        $records =  Document::where('farm_id', Auth::user()->farm_id)->where('type', 'documenti')->orderBy('id', 'DESC')->get();
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
        $record = Document::where('id', '=', $id)->first();
    
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
        $record = Document::where('id', '=', $id)->first();
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
        $document = Document::where('id', '=', $id)->first();
        if($document) {
   
            $document->user_id = Auth::user()->id;
            $document->farm_id = Auth::user()->farm_id;
            $document->nome = $request->nome;
            $document->type = $request->type;
            $file = $request->file('pdf');
            if ($request->hasFile('pdf')) {
                //Delete Old Photo
                if($document->pdf) {
                    $path = public_path($document->pdf);
                    $requested = str_replace("/", "\\", $path);
                    $isExists = \File::exists($requested);
                    if($isExists){
                        unlink($document->pdf);
                    }
                }
                $filename = time().'-'.$file->getClientOriginalName();  
                $file->move(public_path('documents_pdf'), $filename);
                $document->pdf = "documents_pdf/".$filename; 
            }
            $document->update();
            return $this->success($document , 'Record Save successfully.', 201);
            
        }
        if(!isset($document)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

}
