<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Validator;
use App\Http\Requests\UserRequest;

use Authy\AuthyApi;

class UserController extends Controller
{   
    
    /**
     * Store or update user details to the database.
     *
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(UserRequest $request) 
    {   
        $result = UserService::makeRegistration($request);

        if($result['errFlag'] == 0)
        {   
            $user              = $result['user'];
            $result['token']   =  $user->createToken('MyApp')->accessToken;
            return response()->json([$result, 200]);
        }
        else
        {
            return response()->json([$result, 400]);
        }
    }

    /**
     * Api for login
     */
    public function login()
    {   
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {   
            $user               = Auth::user();
            $result['token']    =  $user->createToken('MyApp')->accessToken;
            $result['role']     = $user->role;

            return response()->json([
                'message' => 'Success',
                'result' => $result
            ], 200); 
        }
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    /**
     * Function to get user detail if valid token is present
     */
    public function getUser()
    {   
        if (Gate::authorize('create-post')) {
            dd('ok');
        }
        $result             = array();
        $user               = Auth::user();
        $user['permission'] = $user->user_permission;
        
        if($user)
        {   
            $result['message']  = 'Success';
            $result['result']   = $user;
            $status             = 200;
        }
        else
        {
            $result['message']  = 'Unauthorised';
            $status             = 401;
        }
        return response()->json( $result, $status);
    }
}