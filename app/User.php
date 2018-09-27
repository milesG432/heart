<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;



class User extends Authenticatable
{
    use Notifiable;
    
    public function checkUser($email, $password)
    {
        $errors = [
            
        ];
        $login = [
            
        ];
        try
        {
            if($email && $password)
            {
                $results = DB::select("SELECT * FROM user WHERE email = '" . $email . "' and password = '" . $password . "' LIMIT 1;");                
                if(sizeof($results) == 1)
                {                    
                    $login['loggedIn'] = true;
                    $login['user'] = $results[0] -> firstname;
                    $login['accessLevel'] = $results[0] -> accessLevel;
                }
                else
                {
                    $errors['noUser'] = "There was no user located with the credentials provided. Please check your details and try again.";
                }
                if(sizeof($login) > 0)
                {
                    return $login;
                }
                elseif(sizeof($errors) > 0)
                {
                    return $errors;
                }
            }
            else
            {
                $errors['Error finding login credentials. Please contact heart systems.'];
            }
        } catch (Exception $ex) {
            $errors['exception'] = $ex['message'];
            return $errors;
        }
    }
   
}
