<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Hash;

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
            
            //check email address is valid format
            if($email && strlen($email) > 0 && strpos($email, "@") !== false)
            {
                //check password set and over 6 chars long
                if($password && strlen($password) >= 6)
                {
                    $user = new User();
                    $result =  $user->checkUser($email, $password);                    
                    //if login successfule set user session values
                    if(isset($result['loggedIn']) && $result['loggedIn'] == true)
                    {                        
                        Session()->put('loggedIn',true);
                        Session()->put('user', $result['user']);
                        Session()->put('level', $result['accessLevel']);                         
                        //redirect to home and show full navebar
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
            //if login failed redirect to login page and show errors
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
    
    public function getAdmins()
    {
        try
        {
        $errors =
        [
            
        ];
        $user = new User();
        //get users with admin or heart access levels
        $result = $user->getAdmins();
        //if users exist
        if(isset($result['errors']) || isset($result['exception']))
        {
            return view ("admin", ["errors"=>$result]);
        }
        else if(sizeof($result) > 0)
        {
            return view ("admin", ["admins"=>$result]);
        }
        
        } catch (Exception $ex) {
            $errors['exception'] = $ex->getMessage;
        }        
    }
    
    public function newAdmin(request $request)
    {
        try
        {
            $errors = 
            [

            ];
            $user = new User();
            $admins = $user->getAdmins();
            //dd($admins);
            foreach($admins as $admin)
            {                
                if($admin->email == $request['email'])
                {
                    $errors['duplicate'] = "This email address is already in use.";
                    return view("/admin", ["errors"=>$errors], ["admins"=>$admins]);
                }
            }            
            //validate firstName field
            if($request['firstName'] && strlen($request['firstName']) > 1)
            {
                $firstName = $request['firstName'];
            }
            else
            {
                $errors['firstName'] = "First Name field can not be blank";
            }
            
            //validate lastName field
            if($request['lastName'] && strlen($request['lastName']) > 1)
            {
                $lastName = $request['lastName'];
            }
            else
            {
                $errors['lastName'] = "Last Name field can not be blank";
            }
            
            //validate email
            if($request['email'] && strpos($request['email'], "@") !== false)
            {
                $email = $request['email'];
            }
            else
            {
                $errors['email'] = "Email address can not be blank and must be in a valid email address format";
            }
            
            //validat password
            if($request && strlen($request['password']) >= 6)
            {
                $password = Hash::make($request['password']);
            }
            else 
            {
                $errors['password'] = "Password must not be blank and must be at least 6 characters long";
            }
            //if errors return to admin screen and display errors else proceed to insert new admin
            if(sizeof($errors) > 0)
            {
                return view('/admin', ["errors"=>$errors]);
            }
            else 
            {                
                $result = $user->addAdmin($firstName, $lastName, $email, $password);
            }
            
            if(true == $result)
            {                
                header("Location: /admin");
                die();
            } else 
            {
                $errors['add'] = "There has been a problem creating this admin. Please try again";
                return view('/admin', ["errors"=>$errors]);
            }            
        } catch (Exception $ex) {
            $errors['exception'] = $ex->getMessage;
            return $errors;
        }
    }
}
