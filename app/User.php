<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Hash;


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
                $results = DB::select("SELECT * FROM user WHERE email = '" . $email . "' LIMIT 1;");                
                if(sizeof($results) == 1 && Hash::check($password, $results[0]->password))
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
            $errors['exception'] = $ex->getMessage;
            return $errors;
        }
    }
    
    public function getAdmins()
    {
        try
        {
            $errors = 
            [
                
            ];
            $results = DB::select("SELECT * FROM user WHERE accessLevel != 'customer'");            
            if(sizeof($results) > 0)
            {
                return $results;
            } 
            else 
            {
                $errors['users'] = "No users found. Please contact a site administrator";
            }
            if(sizeof($errors) > 0)
            {
                return $errors;
            }
        } catch (Exception $ex) {
                $errors['exception'] = $ex->getMessage;
                return $errors;
        }
    }
    
    public function addAdmin($firstName, $lastName, $email, $password)
    {
        try
        {            
            $createdAt = date('Y-m-d H:i:s');
            $result = DB::table('user')->insert
            (
                [
                    'firstname' => $firstName, 'surname' => $lastName, 'email' => $email, 'accessLevel' => 'admin', 'createdAt' => $createdAt, 'password' => $password
                ]
            );        
            if($result && true == $result)
            {
                return true;
            } 
            else 
            {
                return false;
            }
        } catch (Exception $ex) {
            return $ex->getMessage;
        }
    }
   
}
