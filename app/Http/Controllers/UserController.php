<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Farms;
use Mail;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records =  User::where('user_by', '!=', NULL)->orderBy('id', 'DESC')->get();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $user = new User();
            if(!$user->where('email',$request->input('email'))->exists()){
                $user =  new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->phone_number = $request->phone_number;
                $user->role = $request->role;
                $user->user_by = Auth::user()->id;
                $user->farm_id = $request->farm_id;
                $user->operaio_id = $request->operaio_id;

                    $details = [
                        'password' => $request->password,
                        'name' => $request->name,
                    ];
                
                    if(strcmp($request->get('role'),'Operaio')== 0 ){
                        \Mail::to($request->email)->send(new \App\Mail\RegistrationMailEmployee($details));
                    } else {
                        \Mail::to($request->email)->send(new \App\Mail\RegistrationMail($details));
                    }
                    
                    if (Mail::failures()) {  
                        return $this->error('Not Send', ['error'=>'Sorry! Please try again latter'], 404); 
                    }else{
                        $user->save();
                        // return $this->success('Great! Successfully send in your mail');
                    }

                    $userObj = User::join('farms', 'farms.id', '=', 'users.farm_id')
                    ->select('users.*', 'farms.nome as farm_name')
                    ->where('users.id', '=', $user->id)
                    ->first();
                    $farmRecord = Farms::where('id', $request->farm_id)->first();
                    $user->checklist = $farmRecord->checklist;

                return $this->success($userObj , 'Record Save and Email Sent!', 201);
            }
            return $this->error('Duplicate Email, Email already exist', "", 404); 
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ], 404);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $record = User::where('id', '=', $id)->with('farms')->first();
        $record = User::join('farms', 'farms.id', '=', 'users.farm_id')
                    ->select('users.*', 'farms.nome as farm_name')
                    ->where('users.id', '=', $id)
                    ->first();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', '=', $id)->first();
       
        if($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->phone_number = $request->phone_number;
            $user->role = $request->role;
            $user->farm_id = $request->farm_id;
            $user->operaio_id = $request->operaio_id;
            $user->update();

            $userObj = User::join('farms', 'farms.id', '=', 'users.farm_id')
                    ->select('users.*', 'farms.nome as farm_name')
                    ->where('users.id', '=', $user->id)
                    ->first();
            $farmRecord = Farms::where('id', $request->farm_id)->first();
            $user->checklist = $farmRecord->checklist;
            return $this->success($userObj , 'Record update successfully.', 200);
            
        }
        if(!isset($user)){
            return response()->json([
                'status' => false,
                'message' => 'No Found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = User::where('id', '=', $id)->first();
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


    public function get($farmId=null) {
        if( isset($farmId) ) {

            $record = User::join('farms', 'farms.id', '=', 'users.farm_id')
                    ->select('users.*', 'farms.nome as farm_name')
                    ->where('user_by', '!=', NULL)->where('farm_id', '=', $farmId)
                    ->get();
            // $record = User::where('user_by', '!=', NULL)->where('farm_id', '=', $farmId)->get();
    
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
        } else {
            // $records =  User::where('user_by', '!=', NULL)->orderBy('id', 'DESC')->get();
            $records = User::join('farms', 'farms.id', '=', 'users.farm_id')
                    ->select('users.*', 'farms.nome as farm_name')
                    ->where('user_by', '!=', NULL)->orderBy('id', 'DESC')
                    ->get();
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
    }
}
