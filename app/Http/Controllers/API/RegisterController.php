<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\CustomMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use CustomMessage;
    public $successStatusCode = 200; ////Success status code
    public $failureStatusCode = 400; //failure status code
    public $successStatus = 'true'; //success
    public $failureStatus = 'false'; //failure

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
           
            return response()->json(['success' => $this->failureStatus, 'data' => $validator->errors() ], $this->failureStatusCode );
        }
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
   
        return response()->json(['success' => $this->successStatus, 'message' => $this->printUserRegisterDetails(), 'data' => $success ], $this->successStatusCode ); 

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'           
        ]);
   
        if($validator->fails()){
          
            return response()->json(['success' => $this->failureStatus, 'message' => 'failure', 'data' => $validator->errors() ], $this->failureStatusCode );
        }  else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $success['token'] =  $user->createToken('MyApp')-> accessToken;
                $success['name'] =  $user->name;

                return response()->json(['success' => $this->successStatus, 'message' => $this->printUserRegisterDetails(), 'data' => $success ], $this->successStatusCode );
            } else {
                return response()->json(['success' => $this->failureStatus, 'message' => $this->printUserNotFound(), 'data' => '' ], $this->failureStatusCode );
            }
        }   
    }


}
