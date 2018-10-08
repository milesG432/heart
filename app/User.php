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
                    $login['id'] = $results[0]->id;
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
    
    public function getAdmins($id = null)
    {
        try
        {
            
            $errors = 
            [
                
            ];            
            if(null !== $id)
            {
                $results = DB::select("SELECT * FROM user WHERE id = '" . $id . "';");
            }
            else
            {
                $results = DB::select("SELECT * FROM user");            
            }            
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
    
    public function addAdmin($firstName, $lastName, $email, $password, $accessLevel, $company)
    {
        try
        {            
            $createdAt = date('Y-m-d H:i:s');
            $result = DB::table('user')->insert
            (
                [
                    'firstname' => $firstName, 'surname' => $lastName, 'email' => $email, 'accessLevel' => 'admin', 'createdAt' => $createdAt, 'password' => $password , 'accessLevel' => $accessLevel, 'company' => $company
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
    
    public function insertEdittedAdmin($admin)
    {
        try
        {            
            //dd($admin);
            $error = 
            [

            ];
            if($admin && sizeof($admin) == 7)
            {                
                $result = DB::table('user')
                        ->where('id', $admin['id'])
                        ->update([
                            'firstname' => $admin['firstname'],
                            'surname' => $admin['lastname'],
                            'email' => $admin['email'],
                            'accessLevel' => $admin['accessLevel'],
                            'password' => $admin['password'],
                            'company' => $admin['company']
                        ]);                
                return $result;
            }
            else 
            {                
                $error['missing fields'] = "Not all needed fields have been supplied";
                return $error;
            }
        } catch (Exception $ex) {
            $error['exception'] = $ex->getMessage;
            return $error;
        }
    }
   
    public function deleteAdmin($id)
    {
        try
        {
            $errors = 
            [
                
            ];
        if($id)
        {            
            $confirmID = DB::table('user')->where('id', $id)->first();
            if($confirmID->id == $id)
            {
                $result = DB::table('user')->delete($id);
                if(true == $result)
                {
                    return $result;
                }
                else 
                {
                    $errors['invalid'] = "Can not delete user detais. Please contact the site administrator.";
                }
            }
            else
            {
                $errors['invalid'] = "Can not locate user detais. Please contact the site administrator.";
            }
        }
        else 
        {
            $errors['noID'] = "No user specified.";
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
}
