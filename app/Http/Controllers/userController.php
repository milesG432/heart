<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
            var_dump($errors);
        } catch (Exception $ex) {

        }
    }
}
