<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Illuminate\Support\Str;
use Mail;

class AuthController extends Controller
{
    use ApiResponser;

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password'=> 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors() , "" , 400);       
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone_number = $request->phone_number;
        $user->role = 'User';
        $user->save();
        $user['token'] = $user->createToken('API Token')->plainTextToken;

        return $this->success($user, 'User register successfully.');

    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);
        
        if($validator->fails()){
            return $this->error( $validator->errors() , "" , 400);       
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $user['token'] =  $user->createToken('API Token')->plainTextToken; 

            // $farm = Farms::where('id', $user->farm_id)->first();
            // $user['checklist'] = $farm->checklist;
            
            return $this->success($user, 'User login successfully.');
        } 
        else{ 
            return $this->error('Invalid Email or Password', "", 401);
        } 
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logout Successfully'
        ];
    }
    public function forgetPassword(Request $request){
        
        $input = $request->only('email');
        $validator = Validator::make($input, [
            'email' => "required|email"
        ]);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $find_user =  User::where('email', $input)->first();
        if(!$find_user) {
            return response()->json([
                'status' => false,
                'message' => 'There is not email found',
                'data' => 'Record not Found',
                'status_code' => 404
            ], 200);
        } else {
            $random_password = Str::random(6);
            $details = [
                'password' => $random_password,
                'name' => $find_user->name,
            ];
           
           
            \Mail::to($find_user->email)->send(new \App\Mail\ForgetMail($details));
            
            if (Mail::failures()) {  
                return $this->error('Not Send', ['error'=>'Sorry! Please try again latter'], 404); 
            }else{
                $find_user->password = bcrypt($random_password);
                $find_user->save();
                return $this->success('Great! Successfully send in your mail');
            }
        }   
    }
    public function changePassword(Request $request){

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
        ]);
        if($validator->fails()){
            return $this->error('Validation Error.' , $validator->errors() , 400);       
        }

        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return $this->error(
                "La tua password attuale non corrisponde alla vecchia password.", 
                [ 'error' => 'La tua password attuale non corrisponde alla vecchia password.'] , 
                200,
                );
        }
        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            // Current password and new password same
            return $this->error("Una nuova password non può essere la stessa della password attuale.", [ 'error' => 'Una nuova password non può essere la stessa della password attuale.'] , 200);
        }

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return $this->success($user ,"Password successfully changed!" );
    }
}
