<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\AppBaseController;
use App\User;


class AuthAPIController extends AppBaseController
{
    private $apiToken;

    public function __construct()
    {
     
      $this->apiToken = str_random(60);
    }
  

    public function login(Request $request){

        $validator = Validator::make($request->all(), [ 
            'username'    => 'required',
            'password' => 'required',
        ]);

        $loginType = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL ) ? 'email' : 'phone';
        $username = $request->input('username');

        $user =  User::where(function ($query) use($username) {
                                    $query->where('email', '=', $username )->orWhere('phone', '=', $username);
                                })->first();

        if(!$user){
            return $this->sendError("Invalid Username.Try creating new account.", 401);

        }
    
        $request->merge([$loginType => $username ]);

        if (Auth::attempt($request->only($loginType, 'password'))) {

            return $this->sendResponse($user, 'Logged in successfully.');
        }
    
        return $this->sendError("Invalid Username or Password.", 401);
        
    }

    public function signup(Request $request){

        $input = $request->all();

        $validator = Validator::make($input, [ 
            'first_name' => 'required|min:4', 
            'last_name' => 'required|min:4',
            'email' => 'required|email', 
            'password' => 'required|min:8', 
            'phone' => 'required|digits:10'
        ]);
        
        if ($validator->fails()) { 
            return $this->sendError($validator->errors(), 201);            
        }
        
        $user = User::where(function ($query) use($input) {
                                $query->where('email', '=', $input['email'] )->orWhere('phone', '=', $input['phone']);
                            })->first();

        if($user){
            return $this->sendResponse($user, 'Account with Username already exists.Try logging.');
        }

         
        $input['api_token'] =  $this->apiToken;

        $user = User::create($input);
        
        $success['token'] = $input['api_token']; 

        return $this->sendResponse($success['token'], 'Account created successfully.');

    }

}
