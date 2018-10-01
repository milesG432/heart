<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class userController extends Controller
{
    //validate user input and pass to User model if ok
    public function logIn(request $request)
    {
        $errors = [
            
        ];
        try
        {
            $email = $request['email'];
            $password = $request['password'];
            
            if($email && strlen($email) > 0 && strpos($email, "@") !== false)
            {
                if($password && strlen($password) >= 6)
                {
                    $user = new User();
                    $result =  $user->checkUser($email, $password);                    
                    if(isset($result['loggedIn']) && $result['loggedIn'] == true)
                    {                        
                        Session()->put('loggedIn',true);
                        Session()->put('user', $result['user']);
                        Session()->put('level', $result['accessLevel']);                         
                        //dd(session()->all());
                        return view("welcome", ["user"=>$result]);
                    } else {
                        $errors['noUser'] = "User not found. Please check your details and try again.";
                    }
                } 
                else 
                {
                    $errors['passwordError'] = "There is a problem with the supplied password. Please check your details and try again";
                }
            }
            else 
            {
                $errors['emailError'] = "There is a problem with the supplied email address. Please check your details and try again.";
            }
            if(sizeof($errors) > 0)
            {
                return view("auth/login", ["errors"=>$errors]);
            }            
        } catch (Exception $ex) {
            $errors['exception'] = $ex->getMessage;
            return view("auth/login", ["errors"=>$errors]);
        }
    }
    
    public function logOut()
    {
        Session::flush();
        $message = "You have been successfully logged out.";
        return view ("auth/login", ["message"=>$message]);
        
    }
}
