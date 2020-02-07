<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Laravel\Passport\HasApiTokens;


class UserService{
  
  use HasApiTokens;
    /**
     * Function to register user
     * @param Request 
     */
    public static function makeRegistration($data)
    {
        
        $result = array();
        if (!empty($data))
        {   
            $user           = new User;
            $user->name     = $data['name'];
            $user->email    = $data['email'];
            $user->role_id  = isset( $data['role_id'] ) ? $data['role_id'] : '3'; 
            $user->password = Hash::make($data['password']);
            $saved          = $user->save();
            
            if($saved)
            {
				$result['errFlag'] 		= 0;
            	$result['msg'] 			= 'Registration completed successfully.Please login to go to your dashboard.';
            	$result['route'] 		= 'login';
            	$result['user'] 		= $user;                
            }
            else
            {   
              $result['errFlag']  = 1;
              $result['msg']      = 'There is some error.';
            }
        }
        else
        {
            $result['errFlag']  = 2;
            $result['msg']      = 'Please enter valid data.';
        }
        return $result;
    }
}